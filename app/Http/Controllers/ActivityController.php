<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Devisi;
use App\Models\TypeActivity;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public function show()
    {
        SEOMeta::setTitle("Kegiatan GenBI");
        OpenGraph::addProperty('type', 'article');
        $posts = Activity::filter(request(["search", "category", "devisi"]))->where("is_active", true)->with(["devisi", "typeActivity"])->latest()->paginate(9);
        $kategory = TypeActivity::get();
        $devisi = Devisi::get();
        return view("page.kegiatan.show", compact("posts", "kategory", "devisi"));
    }
    public function detail(Activity $activities)
    {


        //filter tag
        $filter = strip_tags($activities->body);
        $desc = preg_replace('/\s+/', ' ', trim($filter));
        SEOMeta::addKeyword(['brainpost', 'brainpost genbi', 'Post genbi', 'website genbisultra', 'genbisultra', 'blog genbi', "blog"]);
        SEOMeta::setTitle($activities->nama);
        SEOMeta::setDescription($desc);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription($desc);
        OpenGraph::setTitle($activities->nama);
        OpenGraph::setUrl(route("detail-kegiatan", $activities->slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id');
        OpenGraph::addProperty('locale:alternate', ['id_ID']);
        OpenGraph::addImage(asset("/storage/$activities->thumbnail"));
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(url()->current());

        JsonLd::setTitle($activities->nama);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage(asset("/storage/$activities->thumbnail"));

        if (Auth::check()) {
            if (request()->user()->hasRole(["admin", "super"]) || $activities->user_id === Auth::user()->id) {
            } else {
                if ($activities->is_active != true) {
                    abort(404);
                }
            }
        } else {
            if ($activities->is_active != true) {
                abort(404);
            }
        }
        $kategory = TypeActivity::get();
        $devisi = Devisi::get();
        return view("page.kegiatan.detail", [
            "post" => $activities,
            "kategory" => $kategory,
            "devisi" => $devisi
        ]);
    }
    public function myPost()
    {
        if (request()->user()->hasRole("super")) {
            $posts = Activity::latest()->paginate(5);
        } else {
            $posts = Activity::where("user_id", Auth::user()->id)->latest()->paginate(5);
        }
        return view("page.kegiatan.myPost", compact("posts"));
    }
    public function create()
    {
        $devisi = Devisi::all();
        $type_act = TypeActivity::all();

        return view("page.kegiatan.create", compact("devisi", "type_act"));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $attr = $request->validate([
            "nama" => "required|min:10",
            "devisi" => "required",
            "type_kegiatan" => "required",
            "created_at" => "required|date",
            "body" => "required|min:10",
            "thumbnail" => "required|mimes:png,jpg|max:2048",
            "hero" => "required|mimes:png,jpg|max:2048",
        ]);
        $body = $request->body;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($body, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        if ($images->length !== 0) {
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                if (!empty($data)) {
                    list($type, $data) = explode(';', $data);
                    list($type, $data) = explode(',', $data);
                    $data = base64_decode($data);
                    // $image_name = "/storage/my-brain/img-post/" . time() . $k . '.png';
                    $image_name = "/my-brain/img-post/" . time() . $k . '.png';
                    $path = $image_name;
                    Storage::put($path, $data);
                    // file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', "/storage" . $image_name);
                }
            }
        }
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');

            if ((strpos("$data", 'data:image/png;base64') !== false) || (strpos("$data", 'data:image/jpeg;base64') !== false) || strpos("$data", 'data:image/gif;base64') !== false) {
                // dd("base 64");
                dd("masuk kesini");
                list($type, $data) = explode(';', $data);

                list($type, $data) = explode(',', $data);

                $data = base64_decode($data);

                $image_name = "/storage/posts/img-post/" . time() . $k . '.png';

                $path = public_path() . $image_name;
                file_put_contents(
                    $path,
                    $data
                );
                $img->removeAttribute('src');

                $img->setAttribute('src', "/storage" . $image_name);
            }
        }

        $body = $dom->saveHTML();
        try {
            $thumbnail =  $request->file("thumbnail")->store("kegiatan/thumbnail");
            $hero =  $request->file("hero")->store("kegiatan/hero");
            // dd($hero);
            Activity::create([
                "nama" => $request->nama,
                "hero" => $hero,
                "thumbnail" => $thumbnail,
                "body" => $body,
                "user_id" => Auth::user()->id,
                "TA_id" => $request->type_kegiatan,
                "devisi_id" => $request->devisi
            ]);
        } catch (QueryException $e) {
            dd($e);
            return back()->with(
                "error",
                "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor"
            );
        }
        return redirect()->route("mypost-kegiatan")->with("success", "Post berhasil disimpan");
    }
    public function permitKegiatan(Activity $activities, $permit)
    {
        if ($permit === "accept") {
            try {
                $activities->update([
                    "is_active" => true
                ]);
            } catch (QueryException $e) {
                dd($e);
            }
        } else {
            try {
                $activities->update([
                    "is_active" => false
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                dd($e);
            };
        }
        return back();
    }
    public function edit(Activity $activities)
    {
        // dd(request()->user()->hasRole(["admin", "super"]));
        // dd($activities->slug);
        $devisi = Devisi::all();
        $type_act = TypeActivity::all();
        if ($activities->user_id === Auth::user()->id || request()->user()->hasRole(["super"])) {
            return view("page.kegiatan.edit", [
                "activity" => $activities,
                "devisi" => $devisi,
                "type_act" => $type_act
            ]);
        }
        abort(404);
    }
    public function delete(Activity $activities)
    {

        if ($activities->user_id === Auth::user()->id || request()->user()->hasRole(["super"])) {
            if (Storage::exists($activities->thumbnail)) {
                Storage::delete($activities->thumbnail);
            }

            if (Storage::exists($activities->hero)) {
                Storage::delete($activities->hero);
            }
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);

            $doc->loadHTML($activities->body);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
                // Storage::delete($tg);
            }
            try {
                $activities->delete();
                request()->session()->flash("success", "berhasil menghapus post");
            } catch (\Throwable $e) {
                // dd($e);
                request()->session()->flash("error", "Ups sepertinya terjadi sesuatu");
            }
            return back();
        }
        abort(404);
    }
    public function update(Request $request, Activity $activities)
    {
        $old = [];
        $new = [];
        // validation
        $attr = $request->validate([
            "nama" => "required|min:10",
            "devisi" => "required",
            "TA_id" => "required",
            "body" => "required|min:10",
            "thumbnail" => "mimes:png,jpg|max:2048",
            "hero" => "mimes:png,jpg|max:2048",
            "activity_date" => "required|date"
        ]);
        // end validation
        // handle thumbnail
        if (request()->file("thumbnail")) {
            Storage::delete($activities->thumbnail);
            $attr["thumbnail"] =  $request->file("thumbnail")->store("kegiatan/thumbnail");
        } else {
            $attr["thumbnail"] = $activities->thumbnail;
        }
        if (request()->file("hero")) {
            Storage::delete($activities->hero);
            $attr["hero"] =  $request->file("hero")->store("kegiatan/hero");
        } else {
            $attr["hero"] = $activities->hero;
        }
        // end handle thumbnail
        $content = $request->body;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        // if empty img
        if ($images->length == 0) {
            $doc = new DOMDocument();
            $doc->loadHTML($activities->body);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
        }
        // if empty img

        // dd($images);
        $doc = new DOMDocument();
        $doc->loadHTML($activities->body);

        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            $tg = $tag->getAttribute('src');
            $old[] = $tg;
        }
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');

            if ((strpos("$data", 'data:image/png;base64') !== false) || (strpos("$data", 'data:image/jpeg;base64') !== false) || strpos("$data", 'data:image/gif;base64') !== false) {
                // dd("base 64");
                list($type, $data) = explode(';', $data);

                list($type, $data) = explode(',', $data);

                $data = base64_decode($data);

                $image_name = "/posts/img-post/" . time() . $k . '.png';

                $path = $image_name;
                Storage::put($path, $data);

                // file_put_contents($path, $data);
                $img->removeAttribute('src');

                $img->setAttribute('src', "/storage" . $image_name);
            } else {
                $new[] =  $data;
            }
        }
        if (!empty(array_diff($old, $new))) {
            $diff = array_diff($old, $new);
            foreach ($diff as $path) {
                File::delete(public_path() . $path);
            }
        }

        // $slug = Str::slug($request->nama, '-');

        $attr["body"] = $dom->saveHTML();
        try {
            $activities->update($attr);
        } catch (QueryException $e) {
            dd($e);
            return redirect()->route("mypost-kegiatan")->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        return redirect()->route("mypost-kegiatan")->with("success", "Berhasil Update");
    }
}

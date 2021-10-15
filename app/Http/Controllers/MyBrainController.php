<?php

namespace App\Http\Controllers;

use App\Models\BrainPost;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PDO;
use Illuminate\Support\Str;

class MyBrainController extends Controller
{
    public function show()
    {
        SEOMeta::setTitle("Brain Post");
        $posts = BrainPost::where(["approval" => "accept"])->filter(request(["search", "category"]))->get();
        if (Auth::check()) {
            if (request()->user()->hasRole(["dpt_head", "super"])) {
                $posts = BrainPost::filter(request(["search", "category"]))->get();
            }
        }

        return view("page.my-brain.show", compact("posts"));
    }
    public function detail(BrainPost $brainPost)
    {
        SEOMeta::setTitle($brainPost->title);
        //filter tag
        $filter = strip_tags($brainPost->content);
        $desc = preg_replace('/\s+/', ' ', trim($filter));

        SEOMeta::addKeyword(['brainpost', 'brainpost genbi', 'Post genbi']);

        OpenGraph::setDescription($desc);
        OpenGraph::setTitle($brainPost->title);
        OpenGraph::setUrl(route("detail-brain", $brainPost->slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage(asset("/storage/$brainPost->thumbnail"));
        JsonLd::setTitle($brainPost->title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage(asset("/storage/$brainPost->thumbnail"));

        if (Auth::check()) {
            if (request()->user()->hasRole(["admin", "super"]) || $brainPost->user_id === Auth::user()->id) {
            } else {
                if ($brainPost->approval !== "accept") {
                    abort(404);
                }
            }
        } else {
            if ($brainPost->approval !== "accept") {
                abort(404);
            }
        }

        return view("page.my-brain.detail", [
            "post" => $brainPost
        ]);
    }
    public function create()
    {
        return view("page.my-brain.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|unique:brain_posts,title",
            "content" => "required|min:0",
            "thumbnail" => "mimes:png,jpg,jpeg|required",
            "hero" => "mimes:png,jpg|required"
        ]);

        $content = $request->content;

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        // cek
        // if ($images->length !== 0) {
        //     foreach ($images as $k => $img) {
        //         $data = $img->getAttribute('src');
        //         if (!empty($data)) {
        //             list($type, $data) = explode(';', $data);

        //             list($type, $data) = explode(',', $data);

        //             $data = base64_decode($data);

        //             $image_name = "/storage/my-brain/img-post/" . time() . $k . '.png';

        //             $path = public_path() . $image_name;

        //             file_put_contents($path, $data);

        //             $img->removeAttribute('src');

        //             $img->setAttribute('src', $image_name);
        //         }
        //     }
        // }
        // tanda cek
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');

            if ((strpos("$data", 'data:image/png;base64') !== false) || (strpos("$data", 'data:image/jpeg;base64') !== false) || strpos("$data", 'data:image/gif;base64') !== false) {
                // dd("base 64");
                list($type, $data) = explode(';', $data);

                list($type, $data) = explode(',', $data);

                $data = base64_decode($data);

                // $image_name = "/storage/my-brain/img-post/" . time() . $k . '.png';
                $image_name = "/my-brain/img-post/" . time() . $k . '.png';

                $path = $image_name;
                Storage::put($path, $data);
                // $path = public_path() . $image_name;

                // file_put_contents($path, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', "/storage" . $image_name);
            }
        }

        $slug = Str::slug($request->title, '-');

        $content = $dom->saveHTML();
        try {
            $thumbnail =  $request->file("thumbnail")->store("my-brain/thumbnail");
            $hero =  $request->file("hero")->store("my-brain/hero");
            // dd($hero);
            BrainPost::create([
                "title" => $request->title,
                "category" => $request->category,
                "content" => $content,
                "slug" => $slug,
                "user_id" => Auth::user()->id,
                "thumbnail" => $thumbnail,
                "hero" => $hero
            ]);
        } catch (QueryException $e) {

            dd($e);
            return back()->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        return back()->with("success", "Post berhasil disimpan");
    }
    public function showAll()
    {

        $posts = BrainPost::where("user_id", Auth::user()->id)->get();
        if (request()->user()->hasRole(["admin", "super"])) {
            $posts = BrainPost::all();
        }
        return view("page.my-brain.showAll", compact("posts"));
    }
    public function delete(BrainPost $brainPost)
    {

        if ($brainPost->user_id === Auth::user()->id | request()->user()->hasRole(["dpt_head", "super"])) {
            if (Storage::exists($brainPost->thumbnail)) {
                Storage::delete($brainPost->thumbnail);
            }
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);

            $doc->loadHTML($brainPost->content);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
            try {
                $brainPost->delete();
                request()->session()->flash("success", "berhasil menghapus post");
            } catch (\Throwable $e) {
                request()->session()->flash("error", "Ups sepertinya terjadi sesuatu");
            }
            return back();
        }
        abort(404);
    }
    public function edit(BrainPost $brainPost)
    {
        // dd(request()->user()->hasRole(["admin", "super"]));

        if ($brainPost->user_id === Auth::user()->id || request()->user()->hasRole(["dpt_head", "super"])) {
            return view("page.my-brain.update", [
                "posts" => $brainPost
            ]);
        }
        abort(404);
    }
    protected function cekExist($brainPost, $data)
    {
        $doc = new DOMDocument();
        $doc->loadHTML($brainPost->content);

        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            // echo $tag->getAttribute('src') . "<br>";
            $tg = $tag->getAttribute('src');
            if (strpos("$data", "$tg") === 0) {
                return  "cocok";
            } else {
                File::delete(public_path() . $tg);
            }
        }
    }
    public function approvalPost(BrainPost $brainPost, $approv)
    {
        if ($approv === "accept") {
            try {
                $brainPost->update([
                    "approval" => $approv
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            try {
                $brainPost->update([
                    "approval" => null
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            };
        }
        return back();
    }
    public function update(Request $request, BrainPost $brainPost)
    {
        $old = [];
        $new = [];
        // validation
        $request->validate([
            "title" => "required",
            "content" => "required|min:0",
            "thumbnail" => "mimes:png,jpg,jpeg"
        ]);
        // end validation
        // handle thumbnail
        if (request()->file("thumbnail")) {
            Storage::delete($brainPost->thumbnail);
            $thumbnail =  $request->file("thumbnail")->store("my-brain/thumbnail");
        } else {
            $thumbnail = $brainPost->thumbnail;
        }
        // end handle thumbnail
        $content = $request->content;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        // if empty img
        if ($images->length == 0) {
            $doc = new DOMDocument();
            $doc->loadHTML($brainPost->content);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
        }
        // if empty img

        // dd($images);
        $doc = new DOMDocument();
        $doc->loadHTML($brainPost->content);

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

                $image_name = "/my-brain/img-post/" . time() . $k . '.png';

                $path = $image_name;
                Storage::put($path, $data);
                // $path = public_path() . $image_name;

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

        $slug = Str::slug($request->title, '-');

        $content = $dom->saveHTML();
        try {
            $brainPost->update([
                "title" => $request->title,
                "category" => $request->category,
                "content" => $content,
                "slug" => $slug,
                "user_id" => Auth::user()->id,
                "thumbnail" => $thumbnail,
                "updated_at" => Carbon::now()
            ]);
        } catch (QueryException $e) {
            dd($e);
            return back()->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        return redirect("/my-brain/manage/my-post")->with("success", "Berhasil Update");
    }
}

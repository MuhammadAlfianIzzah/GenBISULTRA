<?php

namespace App\Http\Controllers;

use App\Models\BrainPost;
use App\Models\CategoryPosts;
use App\Models\Posts;
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
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function show()
    {
        SEOMeta::setTitle("Post");
        OpenGraph::addProperty('type', 'article');
        $posts = Posts::filter(request(["search", "category"]))->where(["is_active" => 1])->latest()->get();
        if (Auth::check()) {
            if (request()->user()->hasRole(["admin", "super"])) {
                $posts = Posts::filter(request(["search", "category"]))->latest()->get();
            }
        }

        $kategory = CategoryPosts::get();
        return view("page.posts.show", compact("posts", "kategory"));
    }
    public function detail(Posts $posts)
    {
        SEOMeta::setTitle($posts->title);
        //filter tag
        $filter = strip_tags($posts->content);
        $desc = preg_replace('/\s+/', ' ', trim($filter));

        SEOMeta::addKeyword(['brainpost', 'brainpost genbi', 'Post genbi']);

        OpenGraph::setDescription($desc);
        OpenGraph::setTitle($posts->title);
        OpenGraph::setUrl(route("detail-posts", $posts->slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id');
        OpenGraph::addProperty('locale:alternate', ['id_ID']);
        OpenGraph::addImage(asset("/storage/$posts->thumbnail"));

        JsonLd::setTitle($posts->title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage(asset("/storage/$posts->thumbnail"));

        $kategory = CategoryPosts::get();
        if (Auth::check()) {
            if (request()->user()->hasRole(["admin", "super"]) || $posts->user_id === Auth::user()->id) {
            } else {
                if ($posts->is_active != true) {
                    abort(404);
                }
            }
        } else {
            if ($posts->is_active != true) {
                abort(404);
            }
        }
        return view("page.posts.detail", [
            "post" => $posts,
            "kategory" => $kategory
        ]);
    }
    public function create()
    {
        $category = CategoryPosts::all();
        return view("page.posts.create", [
            "category" => $category
        ]);
    }
    public function store(Request $request)
    {
        $category = CategoryPosts::all();
        $attr =   $request->validate([
            "title" => "required|min:8",
            "category_id" => "required",
            "hero" => "required|mimes:png,jpg,jpeg|max:1040",
            "content" => "required",
            "thumbnail" => "required|mimes:png,jpg,jpeg|max:1040",
        ]);
        $content = $request->content;

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');

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
                // $path = public_path() . $image_name;

                // file_put_contents($path, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', "/storage" .  $image_name);
            }
        }
        $attr["slug"] = Str::slug($request->title, '-');

        $attr["content"] = $dom->saveHTML();
        $attr["thumbnail"] =  $request->file("thumbnail")->store("posts/thumbnail");
        $attr["hero"] =  $request->file("hero")->store("posts/hero");
        $attr["user_id"] = Auth::user()->id;
        try {

            Posts::create($attr);
        } catch (QueryException $e) {
            // dd($e);
            return back()->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        request()->session()->flash("success", "Berhasil menyimpan posts");
        return redirect("/post/manage/my-post");
    }
    public function myPosts()
    {

        $posts = Posts::where("user_id", Auth::user()->id)->latest()->paginate(5);
        return view("page.posts.myPosts", [
            "posts" => $posts
        ]);
    }
    public function delete(Posts $posts)
    {

        if ($posts->user_id === Auth::user()->id) {
            if (Storage::exists($posts->thumbnail)) {
                Storage::delete($posts->thumbnail);
            }
            if (Storage::exists($posts->hero)) {
                Storage::delete($posts->hero);
            }
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);

            $doc->loadHTML($posts->content);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
            try {
                $posts->delete();
                request()->session()->flash("success", "berhasil menghapus post");
            } catch (\Throwable $e) {
                // dd($e);
                request()->session()->flash("error", "Ups sepertinya terjadi sesuatu");
            }
            return back();
        }
        abort(404);
    }
    public function edit(Posts $posts)
    {
        // dd(request()->user()->hasRole(["admin", "super"]));
        $category = CategoryPosts::all();
        if ($posts->user_id === Auth::user()->id || request()->user()->hasRole(["admin", "super"])) {
            return view("page.posts.edit", [
                "posts" => $posts,
                "category" => $category
            ]);
        }
        abort(404);
    }
    public function update(Request $request, Posts $posts)
    {
        $old = [];
        $new = [];
        // validation
        $request->validate([
            "title" => "required",
            "content" => "required|min:0",
            "thumbnail" => "mimes:png,jpg,jpeg|max:1040",
            "category" => "required",
            "hero" => "mimes:png,jpg,jpeg|max:1040"
        ]);
        // end validation
        // handle thumbnail
        if (request()->file("thumbnail")) {
            Storage::delete($posts->thumbnail);
            $thumbnail =  $request->file("thumbnail")->store("posts/thumbnail");
        } else {
            $thumbnail = $posts->thumbnail;
        }
        if (request()->file("hero")) {
            Storage::delete($posts->hero);
            $hero =  $request->file("hero")->store("posts/hero");
        } else {
            $hero = $posts->hero;
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
            $doc->loadHTML($posts->content);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
        }
        // if empty img

        // dd($images);
        $doc = new DOMDocument();
        $doc->loadHTML($posts->content);

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
            $posts->update([
                "title" => $request->title,
                "category_id" => $request->category,
                "content" => $content,
                "slug" => $slug,
                "thumbnail" => $thumbnail,
                "hero" => $hero,
                "updated_at" => Carbon::now()
            ]);
        } catch (QueryException $e) {

            return redirect("post/manage/my-post")->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        return redirect("post/manage/my-post")->with("success", "Berhasil Update");
    }
    public function permitPost(Posts $posts, $permit)
    {

        if ($permit === "accept") {
            try {
                $posts->update([
                    "is_active" => true
                ]);
            } catch (QueryException $e) {
                dd($e);
            }
        } else {
            try {
                $posts->update([
                    "is_active" => false
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            };
        }
        return back();
    }
}

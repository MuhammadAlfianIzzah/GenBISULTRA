<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use DOMDocument;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $attr =   $request->validate([
            "nama" => "required|min:8",
            "biodata" => "required|min:8",
            "hero" => "required|mimes:png,jpg,jpeg",
            "foto_profile" => "required|mimes:png,jpg,jpeg",
        ]);
        $content = $request->biodata;
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

                $image_name = "/storage/user/biodata/" . time() . $k . '.png';

                $path = public_path() . $image_name;

                file_put_contents($path, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', $image_name);
            }
        }
        $slug = Str::slug($request->nama, '-');

        $content = $dom->saveHTML();
        try {
            $profile =  $request->file("foto_profile")->store("user/profile");
            $hero =  $request->file("hero")->store("user/hero");
            Profile::create([
                "nama" => $request->nama,
                "biodata" => $content,
                "slug" => $slug,
                "hero" => $hero,
                "foto_profile" => $profile,
                "user_id" => Auth::user()->id
            ]);
        } catch (QueryException $e) {
            dd($e);
            return back()->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        request()->session()->flash("success", "Berhasil menyimpan posts");
        return redirect("/post/manage/my-post");
    }
    public function update(Request $request)
    {
        $old = [];
        $new = [];
        $profile = Profile::where("user_id", Auth::user()->id)->first();
        $attr = $request->validate([
            "nama" => "min:8",
            "foto_profile" => "mimes:png,jpg",
            "biodata" => "required|min:8",
            "hero" => "mimes:png,jpg,jpeg",
        ]);
        // end validation
        // handle thumbnail
        if (request()->file("foto_profile")) {
            Storage::delete($profile->foto_profile);
            $foto_profile =  $request->file("foto_profile")->store("user/profile");
        } else {
            $foto_profile = $profile->foto_profile;
        }
        if (request()->file("hero")) {
            Storage::delete($profile->hero);
            $hero =  $request->file("hero")->store("user/hero");
        } else {
            $hero = $profile->hero;
        }
        // end handle thumbnail
        $content = $request->biodata;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        // if empty img
        if ($images->length == 0) {
            $doc = new DOMDocument();
            $doc->loadHTML($profile->biodata);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
        }
        // if empty img
        // dd($images);
        $doc = new DOMDocument();
        $doc->loadHTML($profile->biodata);

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

                $image_name = "/storage/user/biodata/" . time() . $k . '.png';

                $path = public_path() . $image_name;

                file_put_contents($path, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', $image_name);
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

        $slug = Str::slug($request->nama, '-');

        $content = $dom->saveHTML();
        try {
            $profile->update([
                "nama" => $request->nama,
                "biodata" => $content,
                "slug" => $slug,
                "hero" => $hero,
                "foto_profile" => $foto_profile,
                "headline" => $request->headline
            ]);
        } catch (QueryException $e) {

            return back()->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
        return back()->with("success", "Berhasil Update");
    }
}

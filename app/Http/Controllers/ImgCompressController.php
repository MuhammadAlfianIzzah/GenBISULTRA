<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImgCompressController extends Controller
{
    public function show()
    {
        return view("page.fitur.imgcompress.show");
    }
    public function compress(Request $request)
    {
        $request->validate(
            [
                "img" => "required"
            ]
        );
        // return  $img = Image::make($request->file("img"))->stream("jpg", 60);
        // $img =   Image::make($request->file("img"))
        //     ->resize(1270, null, function (
        //         $constraint
        //     ) {
        //         $constraint->aspectRatio();
        //     })
        //     ->encode('jpg', 80);
        // return $img->$img->response();
        $name = 'compress.jpg';

        $image = Image::make($request->file("img"))->encode('jpg');
        $headers = [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename=' . $name,
        ];
        return response()->stream(function () use ($image) {
            echo $image;
        }, 200, $headers);
    }
}

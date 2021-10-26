<?php

namespace App\Http\Controllers;

use App\Models\penerimaBeasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenbiController extends Controller
{
    public function create()
    {
        $cek = penerimaBeasiswa::where("user_id", Auth::user()->id)->exists();
        if ($cek) {
            $pB = penerimaBeasiswa::where("user_id", Auth::user()->id)->first();
            return view("page.genbi.daftar", compact("cek", "pB"));
        }
        return view("page.genbi.daftar", compact("cek"));
    }
    public function store(Request $request)
    {
        $attr =  $request->validate(
            [
                'nim' => "required|unique:penerima_beasiswas,nim",
                "fakultas" => "required",
                "jurusan" => "required",
                "tanggal_masuk" => "nullable",
                "tanggal_keluar" => "nullable",
                "no_hp" => "required",
                "angkatan" => "required",
                "pembina" => "required",
                "foto_pengenal" => "required|mimes:png,jpg"
            ]
        );
        $attr["foto_pengenal"] =  $request->file("foto_pengenal")->store("/penerimaB");
        $attr["user_id"] = Auth::user()->id;
        penerimaBeasiswa::create($attr);
        redirect("/genbi/daftar")->with("success", "berhasil mendaftar");
    }
    public function gDepartement()
    {
        return view("page.genbi.departement.gabung");
    }
}

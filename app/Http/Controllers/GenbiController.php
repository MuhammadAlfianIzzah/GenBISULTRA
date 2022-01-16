<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Komisat;
use App\Models\penerimaBeasiswa;
use App\Models\StatusPenerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenbiController extends Controller
{
    public function create()
    {
        $komsats = Komisat::get();
        $devisis = Devisi::get();
        $cek = penerimaBeasiswa::where("user_id", Auth::user()->id)->exists();
        if ($cek) {
            $pB = penerimaBeasiswa::where("user_id", Auth::user()->id)->first();
            return view("page.genbi.daftar", compact("cek", "pB"));
        }
        return view("page.genbi.daftar", compact("cek", "komsats", "devisis"));
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
                "foto_pengenal" => "required|mimes:png,jpg",
                'devisi_id' => "required",
                "komsat_id" => "required",
            ]
        );
        if (penerimaBeasiswa::where("user_id", Auth::user()->id)->first()) {
            return redirect()->route("daftar-genbi")->with("error", "gagal");
        }
        $attr["foto_pengenal"] =  $request->file("foto_pengenal")->store("/penerimaB");
        $attr["user_id"] = Auth::user()->id;
        $data = collect($attr);

        $penerima = penerimaBeasiswa::create($data->toArray());

        try {
            $status = StatusPenerima::create($data->put("penerimaBeasiswa_id", $penerima->id)->toArray());
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }
        return redirect()->route("daftar-genbi")->with("success", "berhasil mendaftar");
    }
    public function gDepartement()
    {
        return view("page.genbi.departement.gabung");
    }
}

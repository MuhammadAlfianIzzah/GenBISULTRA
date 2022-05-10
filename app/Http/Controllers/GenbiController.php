<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Komisat;
use App\Models\penerimaBeasiswa;
use App\Models\StatusPenerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GenbiController extends Controller
{
    public function list()
    {
        $data = penerimaBeasiswa::get();
        return view("page.genbi.anggota.list", compact("data"));
    }
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
    public function edit(penerimaBeasiswa $penerimaBeasiswa)
    {
        $devisis = Devisi::get();
        $komsats = Komisat::get();
        return view("page.genbi.edit", compact("penerimaBeasiswa", "komsats", "devisis"));
    }

    public function update(penerimaBeasiswa $penerimaBeasiswa, Request $request)
    {
        $attr =  $request->validate(
            [
                'nim' => "required",
                "fakultas" => "required",
                "jurusan" => "required",
                "tanggal_masuk" => "nullable",
                "tanggal_keluar" => "nullable",
                "no_hp" => "required",
                "angkatan" => "required",
                "pembina" => "required",
                "foto_pengenal" => "nullable|mimes:png,jpg,webp",
                'devisi_id' => "required",
                "komsat_id" => "required",
                "BAgreement" => "nullable|mimes:pdf"
            ]
        );

        if (request()->file("BAgreement")) {
            Storage::delete($penerimaBeasiswa->BAgreement);
            $attr["BAgreement"] =  $request->file("BAgreement")->store("/berkas/BAgreement");
        } else {
            $attr["BAgreement"] = $penerimaBeasiswa->BAgreement;
        }
        if (request()->file("foto_pengenal")) {
            Storage::delete($penerimaBeasiswa->foto_pengenal);
            $attr["foto_pengenal"] =  $request->file("foto_pengenal")->store("/penerimaB");
        } else {
            $attr["foto_pengenal"] = $penerimaBeasiswa->foto_pengenal;
        }
        // $attr["BAgreement"] =  $request->file("BAgreement")->store("/berkas/BAgreement");
        // $attr["foto_pengenal"] =  $request->file("foto_pengenal")->store("/penerimaB");
        $attr["user_id"] = Auth::user()->id;


        try {
            $penerima = $penerimaBeasiswa->update($attr);
            $attr["penerimaBeasiswa_id"] = $penerimaBeasiswa->id;
            $status = $penerimaBeasiswa->status->update($attr);
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }
        return redirect()->route("daftar-genbi")->with("success", "berhasil mendaftar");
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
                "foto_pengenal" => "required|mimes:png,jpg,webp",
                'devisi_id' => "required",
                "komsat_id" => "required",
                "BAgreement" => "required|mimes:pdf"
            ]
        );
        if (penerimaBeasiswa::where("user_id", Auth::user()->id)->first()) {
            return redirect()->route("daftar-genbi")->with("error", "gagal");
        }
        $attr["BAgreement"] =  $request->file("BAgreement")->store("/berkas/BAgreement");
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

<?php

namespace App\Http\Controllers;

use App\Models\Komisat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KomsatController extends Controller
{
    public function show()
    {
        $komsat = Komisat::get();
        return view("page.genbi.komsat.show", compact("komsat"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required",
            "keterangan" => "required",
            "logo" => "mimes:png,jpg,jpeg|max:4098",
        ]);
        $attr["logo"] =  $request->file("logo")->store("komsat/logo");
        Komisat::create($attr);
        return redirect("/genbi/komsat")->with("success", "berhasil membuat komsat");
    }
    public function delete(Komisat $komisat)
    {
        try {
            if (Storage::exists($komisat->logo)) {
                Storage::delete($komisat->logo);
            }
            $komisat->delete();
        } catch (QueryException $e) {
            return redirect("/genbi/komsat")->with("error", "Gagal menghapus komsat");
        }
        return redirect("/genbi/komsat")->with("success", "Berhasil menghapus komsat");
    }
    public function edit(Request $request, Komisat $komisat)
    {
        return view("page.genbi.komsat.edit", compact("komisat"));
    }
    public function update(Request $request, Komisat $komisat)
    {
        $attr = $request->validate([
            "nama" => "required|unique:type_activities,nama",
            "keterangan" => "required",
            "logo" => "mimes:png,jpg,jpeg,webp|max:4098",
        ]);

        if (request()->file("logo")) {
            Storage::delete($komisat->logo);
            $attr["logo"] =  $request->file("logo")->store("komsat/logo");
        } else {
            $attr["logo"] = $komisat->logo;
        }
        try {
            $komisat->update($attr);
            $request->session()->flash("success", "Berhasil Mengupdate Komsat");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return redirect("/genbi/komsat");
    }
}

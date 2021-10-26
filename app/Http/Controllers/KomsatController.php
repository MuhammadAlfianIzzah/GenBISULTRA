<?php

namespace App\Http\Controllers;

use App\Models\Komisat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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
            "keterangan" => "required"
        ]);
        Komisat::create($attr);
        return redirect("/genbi/komsat")->with("success", "berhasil membuat komsat");
    }
    public function delete(Komisat $komisat)
    {
        try {
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
            "keterangan" => "required|min:10"
        ]);
        try {
            $komisat->update($attr);
            $request->session()->flash("success", "Berhasil Mengupdate Komsat");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return redirect("/genbi/komsat");
    }
}

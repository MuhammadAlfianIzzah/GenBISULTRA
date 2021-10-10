<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeActivityController extends Controller
{
    public function show()
    {
        $typeActivity = TypeActivity::get();
        // Auth::user()->attachRole("admin");
        return view("page.kegiatan.type.show", compact("typeActivity"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required|unique:type_activities,nama|min:5"
        ]);
        TypeActivity::create($attr);
        return redirect("/kegiatan/jenis")->with("success", "Data berhasil disimpan");
    }
    public function delete(Request $request, TypeActivity $TypeActivity)
    {
        try {
            $TypeActivity->delete();
            $request->session()->flash("success", "Berhasil menghapus Devisi");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return back();
    }
    public function edit(Request $request, TypeActivity $typeActivity)
    {
        // dd($typeActivity->nama);
        return view("page.kegiatan.type.edit", compact("typeActivity"));
    }
    public function update(Request $request, TypeActivity $typeActivity)
    {
        $attr = $request->validate([
            "nama" => "required|unique:type_activities,nama|min:5"
        ]);
        try {
            $typeActivity->update($attr);
            $request->session()->flash("success", "Berhasil Mengupdate Jenis Kegiatan");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return redirect("/kegiatan/jenis");
    }
}

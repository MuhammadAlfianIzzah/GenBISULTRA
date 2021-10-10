<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use Illuminate\Http\Request;

class DevisiController extends Controller
{
    public function show()
    {
        $devisi = Devisi::all();
        return view("page.devisi.show", compact("devisi"));
    }
    public function delete(Request $request, Devisi $devisi)
    {
        try {
            $devisi->delete();
            $request->session()->flash("success", "Berhasil menghapus Devisi");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return back();
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required|unique:type_activities,nama|min:5",
            "deskripsi" => "required|min:10"
        ]);
        Devisi::create($attr);
        return redirect("/devisi/manage/show")->with("success", "Data berhasil disimpan");
    }
    public function edit(Request $request, Devisi $devisi)
    {
        return view("page.devisi.edit", compact("devisi"));
    }
    public function update(Request $request, Devisi $devisi)
    {
        $attr = $request->validate([
            "nama" => "required|unique:type_activities,nama|min:5",
            "deskripsi" => "required|min:10"
        ]);
        try {
            $devisi->update($attr);
            $request->session()->flash("success", "Berhasil Mengupdate Devisi");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return redirect("/devisi/manage/show");
    }
}

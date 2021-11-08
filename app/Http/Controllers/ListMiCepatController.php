<?php

namespace App\Http\Controllers;

use App\Models\ListNote;
use App\Models\ResponsList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListMiCepatController extends Controller
{
    public function show()
    {
        $list = ListNote::get();
        return view("page.fitur.listmi.show", compact("list"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "title" => "required",
            "deskripsi" => "required",
        ]);
        $attr["user_id"] = Auth::user()->id;
        ListNote::create($attr);
        return redirect()->route("listmi")->with("success", "Selamat berhasil menyimpan data");
    }
    public function response(Request $request, $id)
    {


        $listnote = ListNote::where("id", $id)->first();
        if (!$listnote) {
            return  abort(404);
        }
        $cek = ResponsList::where("user_id", Auth::user()->id)->exists();

        $responsList = ResponsList::where("idlist", request()->id);
        return view("page.fitur.listmi.response.show", [
            "responsList" => $responsList,
            "id" => request()->id,
            "listnote" => $listnote,
            "cek" => $cek
        ]);
    }
    public function storeresponse(Request $request)
    {
        $attr =   $request->validate([
            "idlist" => "required",
            "jawaban" => "required|min:5"
        ]);;
        $attr["user_id"] = Auth::user()->id;

        ResponsList::create($attr);
        return back();
    }
    public function destroy(Request $request)
    {


        $listnote = ListNote::where("id", $request->id);
        // if($listnote->first()->id);
        // $listnote->first()->user_id

        if ($listnote->first()->user_id == Auth::user()->id) {
            $listnote->delete();
            return redirect()->route("listmi")->with("success", "Selamat data berhasil dihapus");
        } else {
            return redirect()->route("listmi")->with("errors", "anda tidak berhak");
        }
    }
    public function destroyresponse(Request $request)
    {

        $responsList = ResponsList::where("id", $request->id);
        // if($responsList->first()->id);
        // $responsList->first()->user_id

        if ($responsList->first()->user_id == Auth::user()->id) {
            $responsList->delete();
            return back()->with("success", "berhasil menyimpan");
        } else {
            return back()->with("errors", "anda tidak berhak");
        }
    }
}
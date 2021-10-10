<?php

namespace App\Http\Controllers;

use App\Models\CategoryPosts;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function show()
    {
        $category = CategoryPosts::get();
        return view("page.posts.category.show", compact("category"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "name" => "required|unique:category_posts,name|min:5"
        ]);
        CategoryPosts::create($attr);
        return redirect("/post/manage/category")->with("success", "Data berhasil disimpan");
    }
    public function delete(Request $request, CategoryPosts $categoryPosts)
    {
        try {
            $categoryPosts->delete();
            $request->session()->flash("success", "Berhasil menghapus Devisi");
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash("error", "Ups seperti telah terjadi sesuatu");
        }
        return back();
    }
}

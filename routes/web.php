<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MyBrainController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeActivityController;
use App\Models\Activity;
use App\Models\BrainPost;
use App\Models\CategoryPosts;
use App\Models\Devisi;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\TypeActivity;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $kegiatan = Activity::get();
    $posts = BrainPost::limit(5)->where("approval", "accept")->get();
    $devisi = Devisi::get();
    return view('welcome', compact("kegiatan", "posts", "devisi"));
})->name("home");


Route::get("/kegiatan", function () {
    $posts = Activity::filter(request(["search", "category", "devisi"]))->latest()->get();
    $kategory = TypeActivity::get();
    $devisi = Devisi::get();
    return view("page.kegiatan.show", compact("posts", "kategory", "devisi"));
})->name("show-kegiatan");
Route::get("/kegiatan/detail/{activities:slug}", function (Activity $activities) {
    // if ($posts->is_active == false) {
    //     abort(404);
    // }
    if (Auth::check()) {
        if (request()->user()->hasRole(["admin", "super"]) || $activities->user_id === Auth::user()->id) {
        } else {
            if ($activities->is_active != true) {
                abort(404);
            }
        }
    } else {
        if ($activities->is_active != true) {
            abort(404);
        }
    }
    $kategory = TypeActivity::get();
    $devisi = Devisi::get();
    return view("page.kegiatan.detail", [
        "post" => $activities,
        "kategory" => $kategory,
        "devisi" => $devisi
    ]);
})->name("detail-kegiatan");
Route::get("/galery", [GalleryController::class, "show"])->name("galery-genbi");

// Route::get("/post/user", [PostsController::class, "show"])->name("post-user");
Route::get('/foo', function () {
    Artisan::call('storage:link');
});
Route::get("/author", function () {
    return view("page.author");
})->name("author");
Route::middleware(["role:super", "auth", "verified"])->group(function () {
    Route::get("/manage/users", [AdminController::class, "users"])->name("manage-user");
    Route::post("/manage/users", [AdminController::class, "updateRoleUsers"])->name("update-manage-users");
});
Route::middleware(['role:admin|super|ketua', "auth", 'verified'])->group(function () {
    // Kegiatan
    Route::get("/kegiatan/manage/myPost", [ActivityController::class, "myPost"])->name("mypost-kegiatan");
    Route::get("/kegiatan/manage/create", [ActivityController::class, "create"])->name("create-kegiatan");
    Route::post("/kegiatan/manage/create", [ActivityController::class, "store"])->name("create-kegiatan");
    Route::get("/kegiatan/edit/{activities:slug}", [ActivityController::class, "edit"])->name("edit-kegiatan");
    Route::put("/kegiatan/edit/{activities:slug}", [ActivityController::class, "update"])->name("update-kegiatan");
    Route::delete("/kegiatan/manage/delete/{activities:slug}", [ActivityController::class, "delete"])->name("delete-kegiatan");
    // close kegiatan
    // devisi
    Route::get("/devisi/manage/show", [DevisiController::class, "show"])->name("show-devisi");
    Route::post("/devisi/manage/show", [DevisiController::class, "store"])->name("create-devisi");
    Route::delete("/devisi/manage/delete/{devisi:nama}", [DevisiController::class, "delete"])->name("delete-devisi");
    Route::get("/devisi/manage/edit/{devisi:nama}", [DevisiController::class, "edit"])->name("edit-devisi");
    Route::patch("/devisi/manage/edit/{devisi:nama}", [DevisiController::class, "update"])->name("edit-devisi");
    // close devisi

    // kegiatan jenis
    Route::get("/kegiatan/manage/jenis", [TypeActivityController::class, "show"])->name("show-jenis-kegiatan");
    Route::post("/kegiatan/manage/jenis", [TypeActivityController::class, "store"])->name("create-jenis-activity");
    Route::get("/kegiatan/manage/jenis/edit/{typeActivity:nama}", [TypeActivityController::class, "edit"])->name("edit-jenis-kegiatan");
    Route::patch("/kegiatan/manage/jenis/edit/{typeActivity:nama}", [TypeActivityController::class, "update"])->name("edit-jenis-kegiatan");

    Route::delete("/kegiatan/jenis/delete/{TypeActivity:id}", [TypeActivityController::class, "delete"])->name("delete-jenis-activity");

    // close Kegiatan
    // kategory post
    Route::get("/post/manage/category", [CategoryPostController::class, "show"])->name("category-posts");
    Route::post("/post/manage/category", [CategoryPostController::class, "store"])->name("category-posts");
    Route::delete("/post/manage/jenis/delete/{categoryPosts:id}", [CategoryPostController::class, "delete"])->name("delete-category-posts");
    // end kategory post

    // approve
    Route::get("/approve-brain/{brain_post:slug}/{approv}", [MyBrainController::class, "approvalPost"])->name("approvalPost");
    Route::get("/kegiatan/manage/{activities:slug}/{permit}", [ActivityController::class, "permitKegiatan"])->name("izin-kegiatan");
    Route::get("/posts/manage/{posts:slug}/{permit}", [PostsController::class, "permitPost"])->name("izin-posts");
    // close approve
});

Route::get("/kegiatan/berita-kegiatan/{berita}", function ($berita) {
    $post = BrainPost::find(1);

    return view("page.kegiatan.berita.detail", compact("post"));
})->name("detail-berita");
Route::middleware(['auth', "verified"])->group(function () {
    // genbi
    Route::get("/genbi/daftar", function () {
        return view("page.genbi.daftar");
    })->name("daftar-genbi");
    // genbi

    // brain post
    Route::get("/my-brain/manage/create", [MyBrainController::class, "create"])->name("write-brain");
    Route::post("/my-brain/manage/create", [MyBrainController::class, "store"])->name("write-brain");
    Route::get("/my-brain/edit/{brain_post:slug}", [MyBrainController::class, "edit"])->name("edit-brain");
    Route::put("/my-brain/edit/{brain_post:slug}", [MyBrainController::class, "update"])->name("update-brain");
    Route::get("/my-brain/manage/my-post", [MyBrainController::class, "showAll"])->name("my-post");
    Route::delete("/delete-brain/{brain_post:slug}", [MyBrainController::class, "delete"])->name("delete-brain");

    // close brain post


    // posts
    Route::get("/post/manage/create", [PostsController::class, "create"])->name("create-posts");
    Route::post("/post/manage/create", [PostsController::class, "store"])->name("create-posts");

    Route::get("/post/manage/my-post", [PostsController::class, "myPosts"])->name("my-posts");
    Route::delete("/post/manage/delete/{posts:slug}", [PostsController::class, "delete"])->name("delete-posts");
    Route::get("/post/edit/{posts:slug}", [PostsController::class, "edit"])->name("edit-posts");
    Route::put("/post/edit/{posts:slug}", [PostsController::class, "update"])->name("update-posts");
    // close posts


    //dashboard
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact("users"));
    })->name('dashboard');
    // close dashboard

    // profile
    Route::get("/user/profile", function () {
        // Auth::user()->attachRole('admin');
        $users = User::all();
        $user_id = request()->user()->id;
        $profile = Profile::where("user_id", $user_id)->first();
        $posts = Posts::where("user_id", Auth::user()->id)->latest()->get();
        return view("page.user.profile", compact("users", "profile", "posts"));
    })->name("user-profile");
    Route::patch("/user/profile", [ProfileController::class, "update"])->name("user-update");
    Route::get("/user/profile/lengkapi-data", function () {
        return view("page.user.set-profile");
    })->name("set-profile");
    Route::post("/user/profile/lengkapi-data", [ProfileController::class, "store"])->name("set-profile");
    // close profile


});

Route::get("/user/search/{profile:nama}", function (Profile $profile) {
    return view("page.user.show", compact("profile"));
})->name("users-search");
Route::get("/post", [PostsController::class, "show"])->name("show-posts");
Route::get("/beasiswa/info", function () {
    return view("page.beasiswa.show");
})->name("bea-info");
Route::get("/tentangKami/info", function () {
    return view("page.aboutUs");
})->name("tentang-kami");
Route::get("/post/{posts:slug}", function (Posts $posts) {
    $kategory = CategoryPosts::get();
    if (Auth::check()) {
        if (request()->user()->hasRole(["admin", "super"]) || $posts->user_id === Auth::user()->id) {
        } else {
            if ($posts->is_active != true) {
                abort(404);
            }
        }
    } else {
        if ($posts->is_active != true) {
            abort(404);
        }
    }
    return view("page.posts.detail", [
        "post" => $posts,
        "kategory" => $kategory
    ]);
})->name("detail-posts");


// my brain
Route::get("/my-brain", [MyBrainController::class, "show"])->name("my-brain");
Route::get("/my-brain/{brain_post:slug}", [MyBrainController::class, "detail"])->name("detail-brain");
// close brain

require __DIR__ . '/auth.php';

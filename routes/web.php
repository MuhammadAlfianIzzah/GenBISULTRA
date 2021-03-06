<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GenbiController;
use App\Http\Controllers\ImgCompressController;
use App\Http\Controllers\KomsatController;
use App\Http\Controllers\ListMiCepatController;
use App\Http\Controllers\MyBrainController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\RandomPickerController;
use App\Http\Controllers\TypeActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, "show"])->name("home");

Route::get("/kegiatan", [ActivityController::class, "show"])->name("show-kegiatan");
Route::get("/kegiatan/detail/{activities:slug}", [ActivityController::class, "detail"])->name("detail-kegiatan");
Route::get("/galery", [GalleryController::class, "show"])->name("galery-genbi");

Route::get("/author", [WelcomeController::class, "author"])->name("author");
Route::middleware(["role:super", "auth", "verified"])->group(function () {
    Route::get("/genbi/komsat", [KomsatController::class, "show"])->name("show-komsat");
    Route::post("/genbi/komsat", [KomsatController::class, "store"])->name("post-komsat");
    Route::get("/genbi/komsat/edit/{komisat:nama}", [KomsatController::class, "edit"])->name("edit-komsat");
    Route::patch("/genbi/komsat/edit/{komisat:nama}", [KomsatController::class, "update"])->name("update-komsat");
    Route::delete("/genbi/komsat/{komisat:nama}", [KomsatController::class, "delete"])->name("delete-komsat");

    Route::get("/manage/users", [AdminController::class, "users"])->name("manage-user");
    Route::post("/manage/users", [AdminController::class, "updateRoleUsers"])->name("update-manage-users");
});
Route::middleware(['role:admin|super|ketua', "auth", 'verified'])->group(function () {
    // komsat
    // komsat
    // Kegiatan
    Route::get("/kegiatan/manage/myPost", [ActivityController::class, "myPost"])->name("mypost-kegiatan");
    Route::get("/kegiatan/manage/create", [ActivityController::class, "create"])->name("create-kegiatan");
    Route::post("/kegiatan/manage/create", [ActivityController::class, "store"])->name("post-kegiatan");
    Route::get("/kegiatan/edit/{activities:slug}", [ActivityController::class, "edit"])->name("edit-kegiatan");
    Route::put("/kegiatan/edit/{activities:slug}", [ActivityController::class, "update"])->name("update-kegiatan");
    Route::delete("/kegiatan/manage/delete/{activities:slug}", [ActivityController::class, "delete"])->name("delete-kegiatan");
    // close kegiatan
    // devisi
    Route::get("/devisi/manage/show", [DevisiController::class, "show"])->name("show-devisi");
    Route::post("/devisi/manage/show", [DevisiController::class, "store"])->name("create-devisi");
    Route::delete("/devisi/manage/delete/{devisi:nama}", [DevisiController::class, "delete"])->name("delete-devisi");
    Route::get("/devisi/manage/edit/{devisi:nama}", [DevisiController::class, "edit"])->name("edit-devisi");
    Route::patch("/devisi/manage/edit/{devisi:nama}", [DevisiController::class, "update"])->name("update-devisi");
    // close devisi

    // kegiatan jenis
    Route::get("/kegiatan/manage/jenis", [TypeActivityController::class, "show"])->name("show-jenis-kegiatan");
    Route::post("/kegiatan/manage/jenis", [TypeActivityController::class, "store"])->name("create-jenis-activity");
    Route::get("/kegiatan/manage/jenis/edit/{typeActivity:nama}", [TypeActivityController::class, "edit"])->name("edit-jenis-kegiatan");
    Route::patch("/kegiatan/manage/jenis/edit/{typeActivity:nama}", [TypeActivityController::class, "update"])->name("update-jenis-kegiatan");

    Route::delete("/kegiatan/jenis/delete/{TypeActivity:id}", [TypeActivityController::class, "delete"])->name("delete-jenis-activity");

    // close Kegiatan
    // kategory post
    Route::get("/post/manage/category", [CategoryPostController::class, "show"])->name("category-posts");
    Route::post("/post/manage/category", [CategoryPostController::class, "store"])->name("post-category");
    Route::delete("/post/manage/jenis/delete/{categoryPosts:id}", [CategoryPostController::class, "delete"])->name("delete-category-posts");
    // end kategory post

    // approve
    Route::get("/approve-brain/{brain_post:slug}/{approv}", [MyBrainController::class, "approvalPost"])->name("approvalPost");
    Route::get("/kegiatan/manage/{activities:slug}/{permit}", [ActivityController::class, "permitKegiatan"])->name("izin-kegiatan");
    Route::get("/posts/manage/{posts:slug}/{permit}", [PostsController::class, "permitPost"])->name("izin-posts");
    // close approve
});

// Route::get("/kegiatan/berita-kegiatan/{berita}", function ($berita) {
//     $post = BrainPost::find(1);

//     return view("page.kegiatan.berita.detail", compact("post"));
// })->name("detail-berita");
Route::middleware(["auth"])->group(function () {
    Route::get("/List-Mi-Cepat", [ListMiCepatController::class, "show"])->name("listmi");
    Route::delete("/List-Mi-Cepat", [ListMiCepatController::class, "destroy"])->name("delete-listmi");
    Route::post("/List-Mi-Cepat", [ListMiCepatController::class, "store"]);
    Route::get("/List-Mi-Cepat/response/{id}", [ListMiCepatController::class, "response"])->name("respon-list");
    Route::post("/List-Mi-Cepat/response/{id}", [ListMiCepatController::class, "storeresponse"])->name("post-list");
    Route::delete("/List-Mi-Cepat/response/{id}", [ListMiCepatController::class, "destroyresponse"])->name("delete-respon-list");
    Route::get("/List-Mi-Cepat/response/{id}/export", [ListMiCepatController::class, "export"])->name("export-reponListmi");
});

Route::middleware(['auth', "verified"])->group(function () {
    // genbi
    Route::get("/genbi/anggota", [GenbiController::class, "create"])->name("daftar-genbi");
    Route::post("/genbi/anggota", [GenbiController::class, "store"])->name("post-genbi");
    Route::get("/genbi/anggota/list", [GenbiController::class, "list"])->name("list-anggota-genbi");

    Route::get("/genbi/anggota/{penerimaBeasiswa:id}", [GenbiController::class, "edit"])->name("edit-daftar-genbi");
    Route::put("/genbi/anggota/{penerimaBeasiswa:id}", [GenbiController::class, "update"])->name("update-daftar-genbi");

    Route::get("/genbi/gabung/departement", [GenbiController::class, "gDepartement"])->name("gabung-departement");

    // genbi

    // brain post
    Route::get("/my-brain/manage/create", [MyBrainController::class, "create"])->name("write-brain");
    Route::post("/my-brain/manage/create", [MyBrainController::class, "store"])->name("post-brain");
    Route::get("/my-brain/edit/{brain_post:slug}", [MyBrainController::class, "edit"])->name("edit-brain");
    Route::put("/my-brain/edit/{brain_post:slug}", [MyBrainController::class, "update"])->name("update-brain");
    Route::get("/my-brain/manage/my-post", [MyBrainController::class, "showAll"])->name("my-brainPost");
    Route::delete("/delete-brain/{brain_post:slug}", [MyBrainController::class, "delete"])->name("delete-brain");

    // close brain post


    // posts
    Route::get("/post/manage/create", [PostsController::class, "create"])->name("create-posts");
    Route::post("/post/manage/create", [PostsController::class, "store"])->name("post-posts");

    Route::get("/post/manage/my-post", [PostsController::class, "myPosts"])->name("my-posts");
    Route::delete("/post/manage/delete/{posts:slug}", [PostsController::class, "delete"])->name("delete-posts");
    Route::get("/post/edit/{posts:slug}", [PostsController::class, "edit"])->name("edit-posts");
    Route::put("/post/edit/{posts:slug}", [PostsController::class, "update"])->name("update-posts");
    // close posts


    //dashboard
    Route::get('/dashboard', [DashboardController::class, "show"])->name('dashboard');
    // close dashboard

    // profile
    Route::get("/user/profile", [UserController::class, "userProfile"])->name("user-profile");
    Route::patch("/user/profile", [ProfileController::class, "update"])->name("user-update");
    Route::get("/user/profile/lengkapi-data", function () {
        return view("page.user.set-profile");
    })->name("set-profile");
    Route::post("/user/profile/lengkapi-data", [ProfileController::class, "store"])->name("post-set-profile");
    // close profile
});
// Route::get('users/export', [UserController::class, "export"])    ;
Route::get("users", function () {
    $users = Profile::get();
    return view("page.user.users", compact("users"));
})->name("users-genbi");
Route::get("/user/profile/{profile:nama}", function (Profile $profile) {
    return view("page.user.show", compact("profile"));
})->name("users-search");
Route::get("/post", [PostsController::class, "show"])->name("show-posts");
Route::get("/beasiswa/info", function () {
    $posts = Posts::where("category_id", 1)->get();
    return view("page.beasiswa.show", compact("posts"));
})->name("bea-info");
Route::get("/tentangKami/info", function () {
    return view("page.aboutUs");
})->name("tentang-kami");
Route::get("/post/{posts:slug}", [PostsController::class, "detail"])->name("detail-posts");
Route::get("/qrcode/generate", [QrcodeController::class, "show"])->name("show-qrcode");
Route::post("/qrcode/generate", [QrcodeController::class, "generate"])->name("post-qrcode");

Route::get("/random-picker", [RandomPickerController::class, "show"])->name("random-picker");

Route::view("/aplikasi", "page.aplikasi")->name("aplikasi");
Route::get("/img-compress", [ImgCompressController::class, "show"])->name("img-compress.show");
Route::post("/img-compress", [ImgCompressController::class, "compress"])->name("img-compress.compress");

// my brain
Route::get("/my-brain", [MyBrainController::class, "show"])->name("my-brain");
Route::get("/my-brain/{brain_post:slug}", [MyBrainController::class, "detail"])->name("detail-brain");
// close brain

Route::get("tes", function () {
})->middleware("issuper");
require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::filter(request(["search"]))->paginate(10);

        $roles = Role::all();
        return view("page.admin.users", compact("users", "roles"));
    }
    public function updateRoleUsers(Request $request)
    {

        if (empty($request->post()["role"])) {
            $request->session()->flash("error", "role tidak boleh kosong");
            return back();
        }
        $user = User::find($request->user_id);

        // delete old role
        $old_role = [];
        foreach ($user->roles as $role) {
            $old_role[] = $role;
        }

        try {
            $user->detachRoles($old_role);
        } catch (\Throwable $e) {
            $request->session()->flash("error", "ups sepertinya terjadi kesalah");
        }
        // end delete old role

        // new role
        $new_role = [];

        foreach ($request->post()["role"] as $nr) {
            $new_role[] = $nr;
        }
        try {
            $user->attachRoles($new_role);
            $request->session()->flash("success", "berhasil merubah role");
        } catch (\Throwable $e) {
            $request->session()->flash("error", "ups sepertinya terjadi kesalah");
        }
        return back();
    }
}

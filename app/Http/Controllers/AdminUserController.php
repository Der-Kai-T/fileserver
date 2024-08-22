<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.user");

        $user = User::all();
        return view("app.admin.user.index", [
            "user" => $user,
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.user");

        return view("app.admin.user.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.user");

        $data = $request->validate([
            "name" => ['required'],
            "email" => ['required', 'email', 'unique:users']
        ]);

        $password = Str::password(12);

        $user = User::create(array_merge($data, ["password" => Hash::make($password)]));

        return redirect("/user")->with("success", "Benutzer $user->email mit Passwort $password angelegt");
    }


    public function edit(User $user)
    {
        $this->check_permission("admin.user");

        return view("app.admin.user.form", [
            "user" => $user
        ]);
    }


    public function update(Request $request, User $user)
    {
        $this->check_permission("admin.user");

        $data = $request->validate([
            "name" => ['required'],
            "email" => ['required', 'email']
        ]);

        $user->update($data);
        return redirect("/user")->with("success", "Benutzer $user->email aktualisiert");


    }

    public function destroy(User $user)
    {
        $this->check_permission("admin.user");

        $user->delete();
        return redirect("/user")->with("success", "Benutzer $user->email deaktiviert");
    }

    public function enable(User $user)
    {
        $this->check_permission("admin.user");
        $user->disabled = false;
        $user->update();
        return redirect("/user")->with("success", "Benutzer $user->email aktiviert");
    }

    public function role_assign(Request $request, User $user)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $role = Role::where("name", $name)->first();
            $user->assignRole($role);
        }

        return redirect("/user/$user->id/edit")->with("success", "Berechtigungen angepasst");

    }

    public function role_remove(Request $request, User $user)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $role = Role::where("name", $name)->first();
            $user->removeRole($role);
        }

        return redirect("/user/$user->id/edit")->with("success", "Berechtigungen angepasst");

    }

    public function password(Request $request, User $user)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "password" => 'required',
            "password_confirmation" => 'required',
        ]);

        if($data["password"] != $data["password_confirmation"]){
            return back()->with("error", "Passwörter stimmen nicht überein");
        }

        $password = Hash::make($data["password"]);

        $user->update(["password" => $password]);
        return redirect("/user/$user->id/edit")->with("success", "Passwort geändert");

    }
}

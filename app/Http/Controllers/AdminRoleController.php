<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.user");
        $roles = Role::all();
        return view("app.admin.role.index", [
            "roles" => $roles,
        ]);
    }

    public function create()
    {
        $this->check_permission("admin.user");
        return view("app.admin.role.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        $role = Role::create($data);

        return redirect("/role")->with("success", "Rolle $role->name angelegt");
    }


    public function edit(Role $role)
    {
        $this->check_permission("admin.user");
        return view("app.admin.role.form", [
            "role" => $role,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        $role->update($data);
        return redirect("/role")->with("success", "Rolle $role->name bearbeitet");

    }

    public function permission_add(Request $request, Role $role)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $permission = Permission::where("name", $name)->first();
            $role->givePermissionTo($permission);
        }
        return redirect("/role/$role->id/edit")->with("success", "Rolle $role->name bearbeitet");
    }

    public function permission_remove(Request $request, Role $role)
    {
        $this->check_permission("admin.user");
        $data = $request->validate([
            "name" => 'required',
        ]);

        foreach($data["name"] as $name){
            $permission = Permission::where("name", $name)->first();
            $role->revokePermissionTo($permission);
        }
        return redirect("/role/$role->id/edit")->with("success", "Rolle $role->name bearbeitet");
    }



    public function destroy(Role $role)
    {
    }
}

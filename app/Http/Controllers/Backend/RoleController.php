<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function AllPermission() {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission() {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request) {
        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'message' => 'Permission Inserted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id) {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request) {
        Permission::findOrFail($request->id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'message' => 'Permission Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id) {
        Permission::findOrFail($id)->delete();

        $notification = [
            'message' => 'Permission Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AllRoles() {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    public function AddRole() {
        return view('backend.pages.roles.add_role');
    }

    public function StoreRole(Request $request) {
        $role = Role::create([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role Inserted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRole($id) {
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_role', compact('role'));
    }

    public function UpdateRole(Request $request) {
        Role::findOrFail($request->id)->update([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRole($id) {
        Role::findOrFail($id)->delete();

        $notification = [
            'message' => 'Role Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AddRolesPermission() {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.roles.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function RolePermissionStore(Request $request) {
        $data = [];
        $permissions = $request->permission;
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = [
            'message' => 'Role Permission Added Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission() {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles_permission', compact('roles'));
    }

    public function AdminRolesEdit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.roles.roles_permission_edit', compact('role', 'permissions', 'permission_groups'));
    }
}

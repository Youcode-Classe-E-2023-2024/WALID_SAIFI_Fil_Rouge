<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|string|max:255',
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($permission, 201);
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission->name = $request->input('name');
        $permission->save();

        return response()->json(['message' => 'Permission mise à jour avec succès', 'permission' => $permission], 200);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['message' => 'Permission supprimée avec succès'], 200);
    }




    public function assignPermissionToGroup(Request $request, $groupId, $permId)
    {
        $group = Group::findOrFail($groupId);
        $permission = Permission::findOrFail($permId);

        // Vérifier si la permission est déjà assignée au groupe
        if ($group->permissions->contains($permission->id)) {
            return response()->json(['message' => 'La permission est déjà assignée au groupe.'], 422);
        }

        // Assigner la permission au groupe
        $group->permissions()->attach($permission);

        return response()->json(['message' => 'Permission assignée au groupe avec succès'], 200);
    }



}

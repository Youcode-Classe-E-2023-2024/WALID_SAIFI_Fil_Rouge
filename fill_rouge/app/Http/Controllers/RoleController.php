<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Méthode pour ajouter un groupe
    public function ajouter(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Role::create([
            'name' => $request->input('name'),
        ]);

        return response()->json(['message' => 'Le groupe a été ajouté avec succès'], 201);
    }

    public function update(Request $request, $id)
    {

        $group = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group->name = $request->input('name');

        $group->save();

        return response()->json(['message' => 'Le groupe a été mis à jour avec succès'], 200);
    }

    public function delete($id)
    {

        $group = Role::findOrFail($id);

        $group->delete();

        return response()->json(['message' => 'Le groupe a été supprimé avec succès'], 200);
    }


    public function assignUserToGroup(Request $request, $groupId, $userId)
    {
        $group = Role::findOrFail($groupId);
        $user = User::findOrFail($userId);

        $group->users()->syncWithoutDetaching($user);

        return response()->json(['message' => 'Utilisateur assigné au groupe avec succès'], 200);
    }





}

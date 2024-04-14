<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer des rôles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Vendeur']);
        Role::create(['name' => 'Utilisateur']);
    }
}

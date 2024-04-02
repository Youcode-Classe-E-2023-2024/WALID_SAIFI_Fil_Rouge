<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleId = DB::table('roles')->insertGetId([
            'name' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insérer le premier utilisateur avec le rôle admin
        $userId = DB::table('users')->insertGetId([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insérer dans la table pivot "users_roles"
        DB::table('users_roles')->insert([
            'user_id' => $userId,
            'role_id' => $roleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

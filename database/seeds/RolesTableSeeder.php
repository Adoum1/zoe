<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nom' => 'Admin',
            'slug' => 'admin'
        ]);

        DB::table('roles')->insert([
            'nom' => 'Gestionnaire',
            'slug' => 'gestionnaire'
        ]);

        DB::table('roles')->insert([
            'nom' => 'Employe',
            'slug' => 'employe'
        ]);
    }
}

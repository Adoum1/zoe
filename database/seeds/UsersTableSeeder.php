<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'  => '1',
            'nom'     => 'Gomab.admin',
            'prenom'  => 'gomab.employe',
            'sexe'    => 'm',
            'dateNaissance'   => '1990-09-21',
            'email'      => 'admin@gomab.com',
            'matricule'  => 'XXXX',
            'fonction'   => 'admin',
            'site'       => 'Paris',
            'embauche'   => '2016-05-14',
            'password'   => bcrypt('rootadmin')
        ]);

        DB::table('users')->insert([
            'role_id'  => '2',
            'nom'     => 'Gomab.ges',
            'prenom'  => 'gomab.ges',
            'sexe'    => 'f',
            'dateNaissance'   => '1980-09-21',
            'email'      => 'ges@gomab.com',
            'matricule'  => 'XXXX',
            'fonction'   => 'employe',
            'site'       => 'lille',
            'embauche'   => '2015-05-14',
            'password'   => bcrypt('rootges')
        ]);

        DB::table('users')->insert([
            'role_id'  => '3',
            'nom'     => 'Gomab.employe',
            'prenom'  => 'gomab.employe',
            'sexe'    => 'm',
            'dateNaissance'   => '1990-09-21',
            'email'      => 'consumer@gomab.com',
            'matricule'  => 'XXXX',
            'fonction'   => 'narrateur',
            'site'       => 'lille',
            'embauche'   => '2017-05-14',
            'password'   => bcrypt('rootemploye')
        ]);
    }
}


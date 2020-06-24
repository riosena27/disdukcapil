<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create([
            'name' => 'Admin',
            'deskripsi' => 'Level user tertinggi'
        ]);

        Role::create([
            'name' => 'User',
            'deskripsi' => 'User'
        ]);

        Role::create([
            'name' => 'Operator',
            'deskripsi' => 'Operator'
        ]);

        Role::create([
            'name' => 'Kasie',
            'deskripsi' => 'Kasie'
        ]);

        Role::create([
            'name' => 'Kabid',
            'deskripsi' => 'Kabid'
        ]);

        Role::create([
            'name' => 'Kadis',
            'deskripsi' => 'Kadis'
        ]);

        Role::create([
            'name' => 'Operator Loket',
            'deskripsi' => 'Operator Loket'
        ]);


    }
}

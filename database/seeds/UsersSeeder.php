<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name' , 'Admin')->first();
        $operatorRole = Role::where('name' , 'Operator')->first();
        $kasieRole = Role::where('name' , 'Kasie')->first();
        $kabidRole = Role::where('name' , 'Kabid')->first();
        $kadisRole = Role::where('name' , 'Kadis')->first();
        $operatorLoketRole = Role::where('name' , 'Operator Loket')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('operator123')
        ]);

        $kasie = User::create([
            'name' => 'Kasie',
            'email' => 'kasie@gmail.com',
            'password' => Hash::make('kasie123')
        ]);

        $kabid = User::create([
            'name' => 'Kabid',
            'email' => 'kabid@gmail.com',
            'password' => Hash::make('kabid123')
        ]);

        $kadis = User::create([
            'name' => 'Kadis',
            'email' => 'kadis@gmail.com',
            'password' => Hash::make('kadis123')
        ]);

        $operatorLoket = User::create([
            'name' => 'Operator Loket',
            'email' => 'loket@gmail.com',
            'password' => Hash::make('loket123')
        ]);

        $admin->roles()->attach($adminRole);
        $operator->roles()->attach($operatorRole);
        $kasie->roles()->attach($kasieRole);
        $kabid->roles()->attach($kabidRole);
        $kadis->roles()->attach($kadisRole);
        $operatorLoket->roles()->attach($operatorLoketRole);
    }
}

<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create(['name' => 'admin', 'label' => 'Administrator']);
        Role::create(['name' => 'member', 'label' => 'Member']);

        DB::table('users')->delete();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole('admin');

        User::create([
            'name' => 'Member',
            'email' => 'member@test.com',
            'password' => Hash::make('12345678')
        ]);
    }
}

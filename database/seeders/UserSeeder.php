<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $su = User::create([
            'name' => 'su@role.test',
            'email' => 'su@role.test',
            'password' => bcrypt('12345678'),
            'phone_num' => '123456789'
        ]);
        $su->assignRole('su');

        $admin = User::create([
            'name' => 'admin@role.test',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678'),
            'phone_num' => '123456789'
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user@role.test',
            'email' => 'user@role.test',
            'password' => bcrypt('12345678'),
            'phone_num' => '123456789'
        ]);
        $user->assignRole('user');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role = 'ADMIN';
        $user->name = 'Admin Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('adminadmin');
        $user->save();

        $user = new User();
        $user->role = 'CLIENT';
        $user->name = 'Client Client';
        $user->email = 'client@client.com';
        $user->password = bcrypt('adminadmin');
        $user->save();
    }
}
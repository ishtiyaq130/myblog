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
        $user = new User();
        $user->name = "Hamza";
        $user->email = "Hamzu@gmail.com";
        $user->password = '1234325245';
        $user->role = '1';
        $user->save();
    }
}

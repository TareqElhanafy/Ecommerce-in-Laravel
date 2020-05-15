<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','t@2.com')->first();
        if (!$user) {
          User::create([
            'name'=>'tareq',
            'email'=>'t@2.com',
            'password'=>Hash::make('wertyuiop'),
            'role'=>'admin',
          ]);
        }
    }
}

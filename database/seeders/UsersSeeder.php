<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder { 
    /** 
    * Run the database seeds. 
    * 
    * @return void */

 
   public function run() { 
           User::truncate(); 
           $users = [ 
            [ 
              'name' => 'Admin',
              'email' => 'admin@gmail.com',
              'email_verified_at' => null,
              'password' => '123456',
              'is_admin' => true,
            ],
            [ 
              'name' => 'Admin1',
              'email' => 'admin1@gmail.com',
              'email_verified_at' => null,
              'password' => '1234567',
              'is_admin' => true,
            ]
          ];

          foreach($users as $user)
          {
              User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'password' => Hash::make($user['password']),
               'is_admin' => $user['is_admin']
             ]);
           }
    }
}
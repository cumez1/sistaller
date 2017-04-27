<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();

        $usuarios = [
            [
            'name' => 'Nicolas Cumez',
            'email' => 'cumez.1@live.com',
            'password' => bcrypt(12345),
            'remember_token' => str_random(10),
            ]
        ];


        foreach($usuarios as $usuario){
            User::create($usuario);
        }
    }
}

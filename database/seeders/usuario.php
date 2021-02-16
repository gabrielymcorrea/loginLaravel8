<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class usuario extends Seeder
{
    
    //sera executado quando chamar o php artisan db:seed --class=usuario 
    //sera criado um dado no nosso banco de dados
    public function run()
    {
        $usario = new \App\Models\Usuario;
        $usario->usuario = 'admin@gmail.com';
        $usario->senha = Hash::make('aaabbb');
        $usario->save();
    }
}

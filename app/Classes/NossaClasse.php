<?php
namespace App\Classes;


//criação de class
class NossaClasse{
    public function checkSession(){
        return session()->has('usuario');
    }

    public function testar(){
        die('Ola');
    }
}
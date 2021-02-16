<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//sempre no singular, pq ele vai procurar uma tabela no plural
class Usuario extends Model
{
    //usado para eliminar um utilizador, para nao ser eliminado da base da dados, mas sim colocar como inativo
    use  SoftDeletes;
}

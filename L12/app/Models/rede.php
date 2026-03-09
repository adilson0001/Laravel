<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rede extends Model
{
    protected $table = 'redes';
   protected $fillable = [
        'nome',
        'link',
        'password'
    ];
}

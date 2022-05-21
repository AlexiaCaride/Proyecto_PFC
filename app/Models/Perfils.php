<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfils extends Model
{
    protected $table = 'perfils';
    use HasFactory;

    //Relaciono Perfil con usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    use HasFactory;
    //Uno contacto con usuario
    public function user(){
        return $this->belongsTo(User::class);
 }
}

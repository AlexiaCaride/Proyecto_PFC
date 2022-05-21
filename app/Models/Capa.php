<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    use HasFactory;

    //Uno capas con diseños
   public function disenos() {
    return $this->hasMany(Diseno::class);
   }

   //Uno capas con personalizado
   public function personalizado(){
    return $this->belongsToMany(Personalizados::class);
}
}

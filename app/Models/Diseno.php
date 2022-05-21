<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    use HasFactory;
    
 //Relaciono personalizados con diseños
 public function personalizado() {
    return $this->hasOne(Personalizado::class);
   }
   
   //Relaciono capa con diseño
   public function capa(){
    return $this->belongsTo(Capa::class);
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disenos extends Model
{
    use HasFactory;
    //Relaciono Diseños con usuario
    public function user(){
        return $this->belongsTo(User::class);
 }
 //Relaciono personalizados con diseños
 public function personalizados() {
    return $this->hasOne(Personalizados::class);
   }
}

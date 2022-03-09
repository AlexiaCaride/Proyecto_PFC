<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedades extends Model
{
    use HasFactory;
    //Relaciono Novedades con usuario
    public function user(){
        return $this->belongsTo(User::class);
 }

}

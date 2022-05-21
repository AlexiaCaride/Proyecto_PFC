<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    protected $table = 'novedades';
    //Relaciono Novedades con usuario
    public function user(){
        return $this->belongsTo(User::class);
 }

}

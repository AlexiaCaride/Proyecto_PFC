<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    //Relaciono pedido con producto
    public function producto(){
        return $this->belongsToMany(Producto::class);
    }
    //Relaciono pedido con personalizado
    public function personalizado(){
        return $this->belongsToMany(Personalizados::class);
    }
}

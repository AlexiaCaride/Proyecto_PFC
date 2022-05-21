<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalizados extends Model
{
    use HasFactory;

    //Relaciono Personalizados con usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Relaciono Personalizados con diseños
    public function disenos(){
        return $this->belongsTo(Disenos::class);
    }
    //Relaciono Personalizados con capas
    public function capas() {
        return $this->belongsToMany(Capa::class);
    }
    //Relaciono Personalizados con pedido
    public function pedido(){
        return $this->belongsToMany(Pedido::class);
    }
}

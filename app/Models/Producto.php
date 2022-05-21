<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    //Relaciono Poducto con camisetas
    public function camiseta() {
        return $this->hasOne(Camiseta::class);
       }
    ///Relaciono Producto con print
    public function print() {
        return $this->hasOne(Prints::class);
       }
    //Relacion Producto con usuario
    public function user(){
        return $this->belongsToMany(User::class);
    }
    //Relaciono Producto con pedido
    public function pedido(){
        return $this->belongsToMany(Pedido::class);
    }
}

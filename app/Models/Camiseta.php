<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camiseta extends Model
{
    use HasFactory;
    protected $table = 'camisetas';
    
    //Uno camisetas con producto
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}

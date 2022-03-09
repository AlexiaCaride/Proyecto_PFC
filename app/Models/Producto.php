<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function camiseta() {
        return $this->hasOne(Camiseta::class);
       }
    public function taza() {
        return $this->hasOne(Taza::class);
       }
    public function prints() {
        return $this->hasOne(Prints::class);
       }
}

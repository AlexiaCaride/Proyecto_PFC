<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalizados extends Model
{
    use HasFactory;

    public function disenos(){
        return $this->belongsTo(Disenos::class);
    }
}

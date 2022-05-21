<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Relaciono perfil con Usuario
    public function perfil() {
        return $this->hasOne(Perfil::class);
       }
    
    //Relaciono la cesta con el usuario
    public function producto() {
        return $this->belongsToMany(Producto::class);
       }
    
    //Relaciono novedades con Usuario
    public function novedades(){
       return $this->hasMany(Novedades::class);
    }
    //Relaciono diseños con Usuario
    public function personalizados(){
        return $this->hasMany(Personalizados::class);
     }
     //Relaciono contacto con Usuario
    public function contacto(){
        return $this->hasMany(Contacto::class);
     }
       
}

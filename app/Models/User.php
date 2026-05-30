<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'rol_id'];
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relación: un usuario pertenece a un rol.
     */
    public function rol() {
        return $this->belongsTo(Role::class, 'rol_id');
    }
}

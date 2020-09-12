<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $table = 'users';
    protected $fillable = ['username', 'cellphone', 'password', 'role'];
    protected $hidden = ['password'];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }
}

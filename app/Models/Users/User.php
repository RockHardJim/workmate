<?php

namespace App\Models\Users;

use App\Models\Companies\Company;
use App\Models\Companies\CompanyMember;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $fillable = ['email', 'username', 'cellphone', 'password', 'role'];
    protected $hidden = ['password'];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }

    /**
     * Check if user has onboarded or not.
     *
     * @return bool
     */
    public function isOnboarded()
    {
        return false;
        // return CompanyProfile::where('user_id', $this->id)->exist();
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class)->using(CompanyMember::class);
    }
}

<?php

namespace App\Models\Users;

use App\Models\Companies\Company;
use App\Models\Companies\CompanyMember;
use App\Services\Gravatar\Gravatar;
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

    /**
     * The attributes that should be appended onto the user.
     *
     * @var array $appends
     */
    protected $appends = ['gravatar'];

    /**
     * Get gravatar link
     *
     * @return string
     */
    public function getGravatarAttribute()
    {
        return Gravatar::toBase64($this->email);
    }

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
        return $this->companies()->count() > 0;
    }

    /**
     * User has many companies.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasManyThrough
     */
    public function companies()
    {
        return $this->hasManyThrough(Company::class, CompanyMember::class, 'user_id', 'id');
    }

    /**
     * Pull the first user company.
     *
     * @return Company
     */
    public function company()
    {
        return $this->companies()->first();
    }

    public function companyOwner()
    {
        return $this->company()->user_id == $this->id;
    }
}

<?php

namespace App\Models\Companies;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'size',
        'description',
        'industry'
    ];

    /**
     * Add user to company.
     *
     * @param User $user
     * @return boolean
     */
    public function add(User $user)
    {
        if (CompanyMember::where('user_id', $user->id)->where('company_id', $this->id)->exists()) {
            return false;
        }

        $company = CompanyMember::create([
            'user_id' => $user->id,
            'company_id' => $this->id
        ]);

        return $company ? true : false;
    }

    /**
     * Company has many users
     *
     * @param
     */
    public function members()
    {
        return $this->hasManyThrough(User::class, CompanyMember::class);
    }
}

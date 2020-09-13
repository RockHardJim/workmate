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
     * Create new company
     *
     * @param array $daya
     * @return Company $company
     */
    public static function add(array $data)
    {
        $company = self::create($data);

        CompanyBrand::create(['company_id' => $company->id]);

        CompanyMember::create([
            'user_id' => auth()->id(),
            'company_id' => $company->id,
        ]);

        return $company;
    }

    /**
     * Company has brand details.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne(CompanyBrand::class);
    }

    /**
     * Company has many users
     *
     * @param Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function members()
    {
        return $this->hasManyThrough(User::class, CompanyMember::class);
    }
}

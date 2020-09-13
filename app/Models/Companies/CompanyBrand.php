<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBrand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'logo',
        'address',
        'email_address',
        'website'
    ];

    /**
     * The attributes that should be appended.
     *
     * @var array
     */
    protected $appends = [
        'logo_url'
    ];

    /**
     * Brand details belongs to a company.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        $this->belongsTo(Company::class);
    }

    /**
     * Get logo url.
     *
     * @return string
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo ? "/asset/" . (encrypt($this->logo ?? '')) : null;
    }
}

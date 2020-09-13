<?php

namespace App\Models\Platform\Bounties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bounty extends Model
{
    use HasFactory;

    protected $table = 'bounties';
    protected $fillable = ['company', 'name', 'value'];


    public function profile(){
        return $this->hasMany(BountyChallenge::class, 'bounty');
    }
}

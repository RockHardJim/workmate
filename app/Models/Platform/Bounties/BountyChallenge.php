<?php

namespace App\Models\Platform\Bounties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BountyChallenge extends Model
{
    use HasFactory;

    protected $fillable = ['bounty', 'challenge', 'description', 'path', 'address'];

    public function bounty(){
        return $this->belongsTo(Bounty::class);
    }

    public function subscriptions(){
        return $this->hasMany(BountySubscription::class, 'challenge', 'challenge');
    }

    public function tasks(){
        return $this->hasMany(BountyTask::class, 'challenge', 'challenge');
    }
}

<?php

namespace App\Models\Platform\Bounties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BountyProfile extends Model
{
    use HasFactory;

    protected $table = 'bounty_profiles';
    protected $fillable = ['bounty', 'challenge', 'task', 'description', 'path', 'bounty', 'address'];

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

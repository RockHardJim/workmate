<?php

namespace App\Models\Platform\Bounties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BountySubscription extends Model
{
    use HasFactory;

    protected $table = 'bounty_subscriptions';
    protected $fillable = ['challenge', 'user', 'status', 'subscribers'];

    public function profile(){
        $this->belongsTo(BountyChallenge::class);
    }
}

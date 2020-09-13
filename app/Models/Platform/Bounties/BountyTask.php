<?php

namespace App\Models\Platform\Bounties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BountyTask extends Model
{
    use HasFactory;

    protected $table = 'bounty_tasks';
    protected $fillable = ['challenge', 'description', 'value', 'ends'];

    public function profile(){
        return $this->belongsTo(BountyChallenge::class);
    }
}

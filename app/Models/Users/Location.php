<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['user', 'address', 'latitude', 'longitude'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

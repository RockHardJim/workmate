<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user', 'name', 'surname', 'gender', 'path'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

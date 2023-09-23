<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'phone',
        'address',
        'city',
        'state',
        'zip',

    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);

    }


}

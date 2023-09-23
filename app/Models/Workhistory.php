<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workhistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'startdate',
        'enddate',
        'jobtitle',
        'location',
        'role',

    ];
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}

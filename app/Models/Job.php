<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'user_id',
        'description',
        'type',
        'salarymin',
        'salarymax',
        'hourlymin',
        'hourlymax',

    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}

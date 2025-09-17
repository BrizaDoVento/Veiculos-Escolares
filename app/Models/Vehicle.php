<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'model',
        'plate',
        'acquisition_date',
        'accessibility_type',
    ];

    protected $dates = [
        'acquisition_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
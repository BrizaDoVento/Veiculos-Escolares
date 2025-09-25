<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessibilityType extends Model
{
    protected $fillable = ['name'];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'accessibility_type_vehicle');
    }
}
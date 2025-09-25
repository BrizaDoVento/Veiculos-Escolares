<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'modelo',
        'placa',
        'data_aquisicao',
    ];

    // Garante que data_aquisicao será um objeto Carbon
    protected $casts = [
        'data_aquisicao' => 'date',
    ];

    // Relação N:N com AccessibilityType
    public function accessibilityTypes()
    {
        return $this->belongsToMany(AccessibilityType::class, 'accessibility_type_vehicle');
    }
}
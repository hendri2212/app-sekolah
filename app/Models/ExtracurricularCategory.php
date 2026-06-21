<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExtracurricularCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'badge_class',
        'order_number',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function extracurriculars(): HasMany
    {
        return $this->hasMany(Extracurricular::class)->orderBy('order_number');
    }
}

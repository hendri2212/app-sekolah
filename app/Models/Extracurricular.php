<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Extracurricular extends Model
{
    protected $fillable = [
        'extracurricular_category_id',
        'name',
        'slug',
        'image',
        'icon_class',
        'description',
        'registration_url',
        'order_number',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExtracurricularCategory::class, 'extracurricular_category_id');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Storage::disk('public')->exists('eskul/' . $this->image)) {
            return asset('storage/eskul/' . $this->image);
        }

        return asset('storage/eskul/' . $this->image);
    }
}

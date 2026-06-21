<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

        $path = Str::startsWith($this->image, 'eskul/')
            ? $this->image
            : 'eskul/' . $this->image;

        $encodedPath = collect(explode('/', $path))
            ->map(fn ($segment) => rawurlencode($segment))
            ->implode('/');

        return '/storage/' . $encodedPath;
    }
}

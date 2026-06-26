<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Facility extends Model
{
    protected $fillable = [
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

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://', '/'])) {
            return $this->image;
        }

        $encodedPath = collect(explode('/', $this->image))
            ->map(fn ($segment) => rawurlencode($segment))
            ->implode('/');

        return asset($encodedPath);
    }
}

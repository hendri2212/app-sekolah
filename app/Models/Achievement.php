<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Achievement extends Model
{
    protected $fillable = [
        'news_id',
        'title',
        'slug',
        'competition_name',
        'organizer',
        'level',
        'rank',
        'medal_icon',
        'recipient_name',
        'recipient_type',
        'achieved_at',
        'certificate_number',
        'image',
        'description',
        'order_number',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'achieved_at' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function getLevelLabelAttribute(): string
    {
        return match ($this->level) {
            'kota' => 'Kota',
            'kabupaten' => 'Kabupaten',
            'provinsi' => 'Provinsi',
            'nasional' => 'Nasional',
            'internasional' => 'Internasional',
            default => ucfirst((string) $this->level),
        };
    }

    public function getLevelBadgeClassAttribute(): string
    {
        return match ($this->level) {
            'internasional' => 'bg-dark',
            'nasional' => 'bg-danger',
            'provinsi' => 'bg-warning text-dark',
            'kabupaten', 'kota' => 'bg-primary',
            default => 'bg-secondary',
        };
    }

    public function getDisplayDateAttribute(): string
    {
        if (!$this->achieved_at) {
            return '-';
        }

        if ($this->achieved_at->format('m-d') === '01-01') {
            return $this->achieved_at->format('Y');
        }

        return $this->achieved_at->translatedFormat('F Y');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        $path = Str::startsWith($this->image, 'achievements/')
            ? $this->image
            : 'achievements/' . $this->image;

        $encodedPath = collect(explode('/', $path))
            ->map(fn ($segment) => rawurlencode($segment))
            ->implode('/');

        return '/storage/' . $encodedPath;
    }
}

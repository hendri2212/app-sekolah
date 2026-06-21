<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OsisMember extends Model
{
    protected $fillable = [
        'osis_period_id',
        'position',
        'name',
        'photo',
        'department',
        'order_number',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->photo) {
            return null;
        }

        if (Str::startsWith($this->photo, ['http://', 'https://'])) {
            return $this->photo;
        }

        if (Storage::disk('public')->exists($this->photo)) {
            return asset('storage/' . $this->photo);
        }

        return asset('assets/foto/' . $this->photo);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(OsisPeriod::class, 'osis_period_id');
    }
}

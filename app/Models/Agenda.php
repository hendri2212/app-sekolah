<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Agenda extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'start_at',
        'end_at',
        'is_published',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function getTimeRangeAttribute(): string
    {
        if (!$this->end_at) {
            return $this->start_at->format('H:i') . ' WITA';
        }

        return $this->start_at->format('H:i') . ' - ' . $this->end_at->format('H:i') . ' WITA';
    }

    public function getStatusLabelAttribute(): string
    {
        $now = Carbon::now();

        if ($this->end_at && $this->end_at->isPast()) {
            return 'Selesai';
        }

        if ($this->start_at->isPast() && (!$this->end_at || $this->end_at->isFuture())) {
            return 'Berlangsung';
        }

        return 'Akan Datang';
    }
}

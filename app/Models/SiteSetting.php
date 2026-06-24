<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    public const SPMB_MENU_ENABLED = 'spmb_menu_enabled';

    protected $fillable = [
        'key',
        'value',
    ];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        return static::query()->where('key', $key)->value('value') ?? $default;
    }

    public static function setValue(string $key, mixed $value): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => (string) $value]
        );
    }

    public static function isSpmbMenuEnabled(): bool
    {
        return filter_var(static::getValue(self::SPMB_MENU_ENABLED, true), FILTER_VALIDATE_BOOLEAN);
    }
}

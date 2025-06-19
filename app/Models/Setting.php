<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    // Acceso rápido: Setting::getValue('sidebar_color')
    public static function getValue($key, $default = null)
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    public static function setValue($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}

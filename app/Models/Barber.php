<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'instagram_handle',
        'image_url',
    ];

    /**
     * Get clean Instagram username without @.
     */
    public function getCleanInstagramHandleAttribute(): ?string
    {
        if (!$this->instagram_handle) {
            return null;
        }

        return ltrim($this->instagram_handle, '@');
    }
}

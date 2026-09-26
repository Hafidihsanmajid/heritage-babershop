<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'image_url',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'integer',
    ];

    /**
     * Get price formatted in Indonesian Rupiah.
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}

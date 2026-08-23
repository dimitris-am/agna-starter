<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PointOfSale extends Model
{
    /** @use HasFactory<\Database\Factories\PointOfSaleFactory> */
    use HasFactory;

    protected $table = 'points_of_sale';

    protected $fillable = [
        'partner_id',
        'name',
        'city',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

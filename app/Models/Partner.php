<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'tier',
    ];

    public function pointsOfSale(): HasMany
    {
        return $this->hasMany(PointOfSale::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

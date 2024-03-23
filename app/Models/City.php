<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Get all of the hotels for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'city_id', 'id');
    }
}

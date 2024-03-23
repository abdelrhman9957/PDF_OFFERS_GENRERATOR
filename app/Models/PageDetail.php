<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    use HasFactory;

    /**
     * Get all of the hotel for the PageDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'id', 'hotel_id');
    }

    /**
     * Get the meal associated with the PageDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function meal()
    {
        return $this->hasOne(Meal::class, 'id', 'meal_id');
    }


    /**
     * Get the room associated with the PageDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function room()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }
}

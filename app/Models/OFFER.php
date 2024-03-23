<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OFFER extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the OFFER
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the pages for the OFFER
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class, 'offer_id', 'id');
    }


    /**
     * Get the cost associated with the OFFER
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cost()
    {
        return $this->hasOne(IndexPagePrice::class, 'offer_id', 'id');
    }
}

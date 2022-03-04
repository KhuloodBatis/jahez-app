<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'restaurant_id', 'price',
    ];

    /**
     * The roles that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /**
     * Get the user associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    public function restaurant(): HasOne
    {
        return $this->hasOne(Restaurant::class, 'restaurant_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }

    /**
     * The roles that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function meal(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id', 'user_id', 'price',
    ];

    /**
     * The roles that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function restaurant(): BelongsToMany
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function user(): BelongsToMany
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

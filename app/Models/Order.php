<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'restaurant_id', 'price',
    ];

 /**
  * Get the user associated with the Order
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasOne
  */
 public function user(): BelongsTo
 {
     return $this->belongsTo(User::class, 'foreign_key', 'local_key');
 }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }



    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class);
    }
}

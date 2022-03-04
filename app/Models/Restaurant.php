<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //this should return the list of meals

    public function meals()
    {

        return $this->hasMany(Meal::class);
    }

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}

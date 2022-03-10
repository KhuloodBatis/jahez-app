<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function orders(): hasMany
    {
        return $this->hasMany(Order::class);
    }
}

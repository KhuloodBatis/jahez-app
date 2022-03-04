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
    /**
     * The users that belong to the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
   /**
    * The roles that belong to the Restaurant
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
  
}

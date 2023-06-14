<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['address', 'order', 'status', 'skip_comment', 'driver_latitude', 'driver_longitude','food_rating', 'driver_rating'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

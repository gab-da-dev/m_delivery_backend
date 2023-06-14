<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lat', 'lng', 'open_time', 'close_time', 'active', 'delivery_cost', 'delivery_limit'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

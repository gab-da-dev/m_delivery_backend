<?php

namespace App\Models;

use App\Models\Store;
use Livewire\TemporaryUploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'ingredients' => 'array',
        'size_pricing' => 'array',
    ];

    protected $fillable = ['description', 'name', 'ingredients', 'size_pricing', 'product_category_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

<?php

namespace App\Models;

use App\Models\Product as Product;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'description'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/categories/' . $value),
        );
        // use Illuminate\Database\Eloquent\Casts\Attribute;
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
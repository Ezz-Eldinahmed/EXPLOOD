<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'user_id', 'slug', 'description', 'price'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productSkus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        unset($array['name']);

        return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

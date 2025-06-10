<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'latitude', 'longitude', 'city_id', 'category_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function destinationImages()
    {
        return $this->hasMany(DestinationImage::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}

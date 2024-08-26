<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_name',
        'price',
        'property_size',
        'garage_size',
        'rooms',
        'bathrooms',
        'availability',
        'description',
        'location',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'renter_id'
    ];
    public function renter(){
        return $this->belongsTo(Renter::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

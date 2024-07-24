<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'surface', 
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address', 
        'postal_code',
        'sold'
    ];

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug()
    {
        return Str::slug($this->title);
    }
}

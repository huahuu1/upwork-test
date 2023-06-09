<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'cost',
        'unit',
        'weight',
        'image_url',
        'description',
        'catalog_id',
        'status',
    ];

    protected $casts = [
        'image_url' => 'array',
    ];
}

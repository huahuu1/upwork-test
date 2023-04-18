<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

     /**
     * Get the products belong to the catalog.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'catalog_id', 'id');
    }
}

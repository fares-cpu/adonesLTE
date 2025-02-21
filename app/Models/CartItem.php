<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the product associated with the CartItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the Cart that owns the CartItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function custom(): BelongsTo
    {
        return $this->belongsTo(Custom::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

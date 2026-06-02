<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'article',
        'quantity',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->name . '-' . uniqid());
            }
        });

        static::creating(function ($product) {

            if (empty($product->article)) {
                $product->article = self::generateArticle();
            }

            while (self::where('article', $product->article)->exists()) {
                $product->article = self::generateArticle();
            }
        });
    }

    private static function generateArticle(): string
    {
        return strtoupper(
            'PRD-' . date('Y') . '-' . Str::random(6)
        );
    }

    public function items(): HasMany
    {
        return $this->hasMany(CustomItem::class);
    }
}


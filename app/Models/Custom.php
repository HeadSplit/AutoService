<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Custom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function statusLabel()
    {
        return match ($this->status) {
            'accepted' => 'Новый',
            'in_progress' => 'В работе',
            'completed' => 'Завершён',
            default => 'Неизвестно',
        };
    }

    public function items(): HasMany
    {
        return $this->hasMany(CustomItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

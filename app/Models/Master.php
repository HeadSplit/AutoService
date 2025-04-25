<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

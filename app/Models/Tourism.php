<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourism extends Model
{
    use HasFactory;

    protected $table = 'tourism';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'accommodation',
        'transportation',
        'food',
        'price',
        'open',
        'close'
    ];

    protected $casts = [
        // 'price' => 'float',
        // 'open' => 'time',
        // 'close' => 'time',
    ];
}

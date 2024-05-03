<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction'; 

    protected $fillable = [
        'user_id',
        'name',
        'jk',
        'nik',
        'start_date',
        'duration_stay',
        'standar' ,
        'deluxe' ,
        'family',
        'hp',
        'date',
        'number_people',
        'number_day',
        'accommodation',
        'transportation',
        'food',
        'travel_package_price',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    protected $casts = [
        'date' => 'date',
        'travel_package_price' => 'float',
        'total' => 'float',
    ];
}

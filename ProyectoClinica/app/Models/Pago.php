<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'payment_date',
        'status',
    ];

    protected $casts = [
        'payment_methods' => 'array', // Cast a array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

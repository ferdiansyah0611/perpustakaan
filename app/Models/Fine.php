<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $table = 'fines';

    protected $fillable = [
        'borrowing_id',
        'amount',
        'information',
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'users_id',
        'from',
        'to',
        'accepted',
        'closed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}

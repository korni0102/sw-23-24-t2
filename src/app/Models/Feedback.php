<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'contracts_id'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contracts_id');
    }
}

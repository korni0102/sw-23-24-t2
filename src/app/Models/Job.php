<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'companies_id',
        'contracts_id',
        'description'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contracts_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'tel',
        'email',
        'companies_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }
}

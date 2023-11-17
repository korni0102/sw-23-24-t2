<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $guard_name = 'web'; // Set your default guard name here
    protected $fillable = [
        'id',
        'role',
    ];
}

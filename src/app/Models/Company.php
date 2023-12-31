<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'address'
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'company_id');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'company_id');
    }

    public function zastupcas(): HasMany
    {
        return $this->hasMany(Zastupca::class, 'company_id');
    }
}


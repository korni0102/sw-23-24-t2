<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'tel',
        'email',
        'company_id'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function contract(): HasMany
    {
        return $this->hasMany(Contract::class, 'contact_id');
    }

    public function contact(): HasMany
    {
        return $this->hasMany(Feedback::class, 'contact_id');
    }

}

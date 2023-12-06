<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'contact_id',
        'job_id',
        'from',
        'to',
        'accepted',
        'closed',
        'ppp_id',
        'hodnotenie',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function ppp(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ppp_id');
    }
}

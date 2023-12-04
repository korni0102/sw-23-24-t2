<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'job_id',
        'accepted',
        'ppp_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
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

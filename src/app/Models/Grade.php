<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'user_id', 'contract_id', 'vystupovanie', 'jednanie_s_klientom',
        'samostatnost_prace', 'tvorivy_pristup', 'dochvilnost',
        'dodrzovanie_etickych_zasad', 'motivacia',
        'doslednost_pri_plneni_povinnosti', 'ochota_sa_ucit',
        'schopnost_spolupracovat', 'vyuzitie_pracovnej_doby'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'paiement_montant',
        'paiement_date',
        'periode_number',
        'contract_id',
    ];
    protected $casts = [
        'paiement_date' => 'date', // Laravel va automatiquement caster en objet Carbon
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}

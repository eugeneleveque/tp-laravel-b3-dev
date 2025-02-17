<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['box_id', 'tenant_id', 'start_date', 'end_date'];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getStatusAttribute(): string
    {
        $today = Carbon::today();

        if ($today->between($this->start_date, $this->end_date)) {
            return 'En cours';
        }

        return $this->end_date; // Retourne la date de fin si le contrat est terminé
    }

}

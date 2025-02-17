<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'user_id'];

    protected $casts = [
        'content' => 'array', // Conversion automatique JSON <-> Array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

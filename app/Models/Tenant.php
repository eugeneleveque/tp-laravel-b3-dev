<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'bank_account',
    ];
    //relation avec boxes
    // public function boxes() {
    //     return $this->hasMany(Box::class);
    // }
}

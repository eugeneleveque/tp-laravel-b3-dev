<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'phone',
        'email',
        'address',
        'bank_account',
    ];
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    
}
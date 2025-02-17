<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $table = "boxes";

    protected $fillable = [
        "name",
        "size",
        "price",
        "location",
        "status",
    ];
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

}

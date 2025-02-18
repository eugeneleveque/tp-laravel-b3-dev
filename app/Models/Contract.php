<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['box_id', 'tenant_id', 'user_id', 'contract_template_id', 'monthly_price', 'start_date', 'end_date'];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contractTemplate()
    {
        return $this->belongsTo(ContractTemplate::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'contract_id');
    }
    
}

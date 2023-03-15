<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function point(){
        return $this->hasOne(Point::class);
    }

    public function redeems()
    {
        return $this->hasMany(Redeem::class,);
    }

}

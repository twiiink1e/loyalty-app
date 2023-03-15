<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'logo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rewards(){
        return $this->hasMany(Reward::class);
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function points(){
        return $this->hasMany(Point::class);
    }

    public function redeems(){
        return $this->hasMany(Redeem::class);
    }

    public function calculation(){
        return $this->hasOne(Calculation::class);
    }
    
}

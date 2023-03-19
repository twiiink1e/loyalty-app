<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'point',
        'remark',
        'company_id',
        'image',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function announcement()
    {
        return $this->hasOne(Announcement::class,);
    }

    public function redeems()
    {
        return $this->hasMany(Redeem::class,);
    }


}

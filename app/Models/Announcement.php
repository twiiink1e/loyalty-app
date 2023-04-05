<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic',
        'description',
        'thumbnail',
        'reward_id',
        'company_id',
        'expire',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }
}

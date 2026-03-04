<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EmailOtp extends Model
{

    protected $table = 'email_otps';

    protected $fillable = [
        'email',
        'otp',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];


    // Check if OTP is expired
    public function isExpired()
    {
        return $this->expires_at->isPast();
    }

}

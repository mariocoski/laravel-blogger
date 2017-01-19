<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{

    use Notifiable;

    protected $guarded = [];

    public static function findByEmail($email)
    {
        return static::where('email', $email)->first();
    }

}

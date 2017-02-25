<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{

    protected $table = 'subscriptions';

    use Notifiable;

    protected $guarded = [];

    public static function findByEmail($email)
    {
        return static::where('email', $email)->first();
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

}

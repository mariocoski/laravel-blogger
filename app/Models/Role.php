<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'display_name', 'description', 'permissions_level'];

    public static function admin()
    {
        return static::getByName('admin');
    }

    public static function editor()
    {
        return static::getByName('editor');
    }

    public static function user()
    {
        return static::getByName('user');
    }

    public static function getByName($name)
    {
        return static::where('name', $name)->first();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $table = 'settings';

    public $timestamps = false;

    protected $fillable = ['id', 'name', 'value'];

    public static function getByName($name)
    {
        $setting = static::where('name', $name)->first();
        return (!is_null($setting)) ? $setting->value : "";
    }

    public static function setByName($name, $value = null)
    {
        $setting = static::where('name', $name)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        }
    }

    public static function getMetaTitle()
    {
        return static::getByName('meta_title');
    }

    public static function getMetaAuthor()
    {
        return static::getByName('meta_author');
    }

    public static function getMetaDescription()
    {
        return static::getByName('meta_description');
    }

    public static function getMetaKeywords()
    {
        return static::getByName('meta_keywords');
    }

    public static function getMetaRobots()
    {
        return static::getByName('meta_robots');
    }

    public static function getDisqusShortname()
    {
        return static::getByName('disqus_shortname');
    }

    public static function getGoogleAnalyticsId()
    {
        return static::getByName('google_analytics_id');
    }

    public static function setMetaTitle($value)
    {
        return static::setByName('meta_title', $value);
    }

    public static function setMetaAuthor($value)
    {
        return static::setByName('meta_author', $value);
    }

    public static function setMetaDescription($value)
    {
        return static::setByName('meta_description', $value);
    }

    public static function setMetaKeywords($value)
    {
        return static::setByName('meta_keywords', $value);
    }

    public static function setMetaRobots($value)
    {
        return static::setByName('meta_robots', $value);
    }

    public static function setDisqusShortname($value)
    {
        return static::setByName('disqus_shortname', $value);
    }

    public static function setGoogleAnalyticsId($value)
    {
        return static::setByName('google_analytics_id', $value);
    }

}

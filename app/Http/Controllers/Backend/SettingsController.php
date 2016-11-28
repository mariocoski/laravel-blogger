<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\SettingsRequest;
use App\Models\Settings;
use View;

class SettingsController extends Controller
{
    public function index()
    {
        $metaRobotsOptions = $this->getMetaRobotsOptions();

        $settings = $this->getSettings();

        return View::make('backend.settings.edit', compact('settings', 'metaRobotsOptions'));
    }

    public function update(SettingsRequest $request)
    {
        $input = $request->all();

        Settings::setMetaTitle($input['meta_title']);
        Settings::setMetaAuthor($input['meta_author']);
        Settings::setMetaDescription($input['meta_description']);
        Settings::setMetaKeywords($input['meta_keywords']);
        Settings::setMetaRobots($input['meta_robots']);
        Settings::setDisqusShortname($input['disqus_shortname']);
        Settings::setGoogleAnalyticsId($input['google_analytics_id']);

        return redirect()->back()->with('status', 'Settings have been updated');
    }

    protected function getMetaRobotsOptions()
    {
        return [
            ['name' => 'INDEX, FOLLOW', 'value' => 'INDEX, FOLLOW'],
            ['name' => 'NOINDEX, FOLLOW', 'value' => 'NOINDEX, FOLLOW'],
            ['name' => 'INDEX, NOFOLLOW', 'value' => 'INDEX, NOFOLLOW'],
            ['name' => 'INDEX, NOFOLLOW', 'value' => 'NOINDEX, NOFOLLOW'],
            ['name' => 'NOARCHIVE', 'value' => 'NOARCHIVE'],
        ];
    }

    protected function getSettings()
    {
        return [
            'meta_title' => Settings::getMetaTitle(),
            'meta_author' => Settings::getMetaAuthor(),
            'meta_description' => Settings::getMetaDescription(),
            'meta_keywords' => Settings::getMetaKeywords(),
            'meta_robots' => Settings::getMetaRobots(),
            'disqus_shortname' => Settings::getDisqusShortname(),
            'google_analytics_id' => Settings::getGoogleAnalyticsId(),
        ];
    }

}

<?php

use App\Models\Role;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SettingsTest extends BrowserKitTest
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    protected function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
        $newAdmin = factory(App\Models\User::class)->create();
        $newAdmin->resolveRole(Role::admin()->id);
        $this->admin = $newAdmin;
    }

    private $admin;
    private $category;

    public function test_if_can_update_settings()
    {
        $meta_title = "Blogger";
        $meta_author = "Mariusz Rajczakowski";
        $meta_description = "Great blogging platform powered by Laravel";
        $meta_keywords = "blog,blogger,post,articles";
        $meta_robots = 'NOINDEX, FOLLOW';
        $disqus_shortname = "blogger";
        $google_analytics_id = "UA-000000-01";

        $this->actingAs($this->admin)
            ->visit('/dashboard/settings')
            ->type($meta_title, 'meta_title')
            ->type($meta_author, 'meta_author')
            ->type($meta_keywords, 'meta_keywords')
            ->type($meta_description, 'meta_description')
            ->select($meta_robots, 'meta_robots')
            ->type($disqus_shortname, 'disqus_shortname')
            ->type($google_analytics_id, 'google_analytics_id')
            ->press('submit');

        $this->seePageIs('/dashboard/settings')
            ->see('Settings have been updated');

        $this->assertEquals($meta_title, Settings::getMetaTitle());
        $this->assertEquals($meta_author, Settings::getMetaAuthor());
        $this->assertEquals($meta_description, Settings::getMetaDescription());
        $this->assertEquals($meta_keywords, Settings::getMetaKeywords());
        $this->assertEquals($meta_robots, Settings::getMetaRobots());
        $this->assertEquals($disqus_shortname, Settings::getDisqusShortname());
        $this->assertEquals($google_analytics_id, Settings::getGoogleAnalyticsId());
    }

    public function test_if_can_validate_too_long_inputs()
    {
        $faker = Faker\Factory::create();
        //meta_description max 160 chars
        //meta_title max 60 chars
        $meta_description = $faker->sentence(200);
        $meta_title = $faker->sentence(200);
        $this->actingAs($this->admin)
            ->visit('/dashboard/settings')
            ->type($meta_description, 'meta_description')
            ->type($meta_title, 'meta_title')
            ->press('submit');

        $this->seePageIs('/dashboard/settings')
            ->see('The meta description may not be greater than 160 characters.')
            ->see('The meta title may not be greater than 60 characters.');

    }

}

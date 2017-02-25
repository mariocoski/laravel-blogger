<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\Settings;
use App\Models\User;
use Artisan;
use ConfigWriter;
use Illuminate\Console\Command;
use Schema;
use Validator;

class BloggerInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogger:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs blogging system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment("Welcome to Laravel-Blogger");
        $this->comment("It will just take a moment to install laravel-blogger..." . PHP_EOL);

        // Migrations and Seeding
        $this->migrateAndSeed();

        // Create an Admin Account
        $this->comment(PHP_EOL . "Step 1/7: Creating and Admin Account");
        $this->createAdminAccount();
        $this->line("<info>✔</info> Success! Admin user has been created.");

        // Choose your application name
        $this->comment(PHP_EOL . "Step 2/7: Choose your application name (default: Blogger)");
        $this->updateApplicationName();
        $this->line("<info>✔</info> Success! Application name has been updated");

        // Blog's Author
        $this->comment(PHP_EOL . "Step 3/7: Updating meta author (default: {$this->adminFirstName} {$this->adminLastName})");
        $this->updateBlogAuthor();
        $this->line("<info>✔</info> Success! Blog's author has been updated");

        // Blog's Title
        $this->comment(PHP_EOL . "Step 4/7: Updating meta title (default: Blogger)");
        $this->updateBlogTitle();
        $this->line("<info>✔</info> Success! Blog's title has been updated");

        // Blog's Description
        $this->comment(PHP_EOL . "Step 5/7: Updating meta description (default: Simple and elegant blog platform powered by Laravel)");
        $this->updateBlogDescription();
        $this->line("<info>✔</info> Success! The description has been updated");

        // Blog's Keywords
        $this->comment(PHP_EOL . "Step 6/7: Updating meta keywords (default: laravel,blog,blogger,articles)");
        $this->updateBlogKeywords();
        $this->line("<info>✔</info> Success! The blog's keywords have been updated");

        // Posts Per Page
        $this->comment(PHP_EOL . "Step 7/7: Number of posts to display per page (default: 10)");
        $this->updateArticlesPerPage();
        $this->line('<info>✔</info> Success! The number of posts per page has been updated');

        $this->comment(PHP_EOL . 'Finishing up an application...' . PHP_EOL);

        ConfigWriter::write('blogger', ['admin_email' => $this->adminEmail]);
        // Generating App Key
        $this->comment('Creating a unique application key...');
        Artisan::call('key:generate');

        $this->line(PHP_EOL . '<info>✔</info> Blogger has been installed');

        $this->comment('You can now log in using the following credentials:');
        $headers = ['Login Email', 'Login Password'];
        $data = [['email' => $this->adminEmail, 'password' => $this->adminPassword]];
        $this->table($headers, $data);

    }

    protected function migrateAndSeed()
    {
        if (!Schema::hasTable('migrations')) {

            $this->comment('Migrating and seeding your database...');

            Artisan::call('migrate', ['--seed' => true]);

            $this->line('<info>✔</info> Success! You have successfully migrated and seeded your database');
        }
    }

    protected function createAdminAccount()
    {
        $this->getAdminEmail();
        $this->getAdminPassword();
        $this->getAdminFirstName();
        $this->getAdminLastName();
        $this->createAdmin();
    }

    protected function updateApplicationName()
    {
        $name = $this->ask("Choose your application name (default: Blogger)", "Blogger");
        if (!empty($name)) {
            ConfigWriter::write('app', ['name' => trim($name)]);
        }
    }

    protected function updateBlogAuthor()
    {
        $author = trim($this->ask("Choose author of your blog", $this->adminFirstName . " " . $this->adminLastName));

        Settings::setMetaAuthor($author);
    }

    protected function updateBlogTitle()
    {
        $title = trim($this->ask("Choose title of your blog", "Blogger"));

        Settings::setMetaTitle($title);
    }

    protected function updateBlogDescription()
    {
        $description = trim($this->ask("Choose description of your blog", "Simple and elegant blog platform powered by Laravel"));

        Settings::setMetaDescription($description);
    }

    protected function updateBlogKeywords()
    {
        $keywords = trim($this->ask("Choose keywords of your blog (comma separated)", "laravel,blog,blogger,articles"));

        Settings::setMetaKeywords($keywords);

    }

    protected function updateArticlesPerPage()
    {
        $numberOfArticles = trim($this->ask("Choose number of articles per page", 10));

        if (is_numeric($numberOfArticles) && $numberOfArticles !== 10) {
            ConfigWriter::write('blogger', ['articles_per_page' => $numberOfArticles]);
        }
    }

    protected function getInput($question, $field, $rules)
    {
        do {
            $input = trim($this->ask($question));

            $validator = Validator::make([$field => $input], [$field => $rules]);

            if ($validator->fails()) {
                foreach ($validator->messages()->get($field) as $error) {
                    $this->error($error);
                }
            }

        } while ($validator->fails());

        return $input;
    }

    protected function createAdmin()
    {
        $displayName = $this->adminFirstName . " " . $this->adminLastName;
        $user = User::create([
            'email' => $this->adminEmail,
            'password' => bcrypt($this->adminPassword),
            'first_name' => $this->adminFirstName,
            'last_name' => $this->adminLastName,
            'display_name' => $displayName,
            'slug' => str_slug($displayName),
        ]);

        $user->resolveRole(Role::admin()->id);
    }

    protected function getAdminEmail()
    {
        $this->adminEmail = $this->getInput(
            "Choose email for your admin",
            'email',
            ['email', 'unique:users,email']
        );

    }

    protected function getAdminPassword()
    {
        $this->adminPassword = $this->getInput(
            "Choose password for your admin",
            'password',
            ['required', 'min:6']
        );

    }

    protected function getAdminFirstName()
    {
        $this->adminFirstName = $this->getInput(
            "Choose first name for your admin",
            'firstname',
            ['required']
        );

    }

    protected function getAdminLastName()
    {
        $this->adminLastName = $this->getInput(
            "Choose last name for your admin",
            'lastname',
            ['required']
        );
    }

}

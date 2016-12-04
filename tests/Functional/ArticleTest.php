<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    protected function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->seed('RolesTableSeeder');
        $newAdmin = factory(App\Models\User::class)->create();
        $newAdmin->resolveRole(Role::admin()->id);
        $this->admin = $newAdmin;

        $this->article = factory(App\Models\Article::class)->create();
    }

    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    private $admin;
    private $article;

    public function test_if_can_delete_an_article()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/articles')
            ->press('delete-article-' . $this->article->id)
            ->dontSeeInDatabase('articles', [
                'title' => $this->article->title,
                'slug' => $this->article->slug,
            ])
            ->see('Article has been deleted');
    }
}

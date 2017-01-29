<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends BrowserKitTest
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
        $this->category = factory(App\Models\Category::class)->create();
        $this->tag = factory(App\Models\Tag::class)->create();
        $this->article = factory(App\Models\Article::class)->create();

        $newUser = factory(App\Models\User::class)->create();
        $newUser->resolveRole(Role::editor()->id);
        $this->editor = $newUser;
    }

    private $admin;
    private $editor;
    private $article;
    private $category;
    private $tag;

    public function test_if_can_create_an_article()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/articles/create')
            ->type("new title", 'title')
            ->type("new subtitle", 'subtitle')
            ->type("new slug", "slug")
            ->type("new content", "content")
            ->select($this->category->id, 'category')
            ->select($this->editor->id, 'author_id')
            ->type($this->tag->id, "tags")
            ->press('submit');

        $this->seePageIs('/dashboard/articles');
        $this->see('Article has been created');

        $this->seeInDatabase('articles', [
            'title' => 'new title',
            'subtitle' => 'new subtitle',
            'slug' => 'new slug',
            'content' => 'new content',
            'category_id' => $this->category->id,
            'author_id' => $this->editor->id,
        ]);
    }

    public function test_if_can_update_an_article()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/articles/' . $this->article->id . '/edit')
            ->type("new title", 'title')
            ->type("new subtitle", 'subtitle')
            ->type("new slug", "slug")
            ->type("new content", "content")
            ->select($this->category->id, 'category')
            ->select($this->editor->id, 'author_id')
            ->type($this->tag->id, "tags")
            ->press('submit');

        $this->seePageIs('/dashboard/articles/' . $this->article->id . '/edit');
        $this->see('Article has been updated');

        $this->seeInDatabase('articles', [
            'title' => 'new title',
            'subtitle' => 'new subtitle',
            'slug' => 'new slug',
            'content' => 'new content',
            'category_id' => $this->category->id,
            'author_id' => $this->editor->id,
        ]);
    }

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

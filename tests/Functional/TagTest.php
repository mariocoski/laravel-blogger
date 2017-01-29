<?php

use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends BrowserKitTest
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

        $this->tag = factory(App\Models\Tag::class)->create();
    }

    private $admin;
    private $tag;

    public function test_if_can_validate_when_tag_exists()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/tags/create')
            ->type($this->tag->name, 'name')
            ->type($this->tag->slug, 'slug')
            ->press('submit');

        $this->seePageIs('/dashboard/tags/create')
            ->see('The name has already been taken')
            ->see('The slug has already been taken');
    }

    public function test_if_can_create_new_tag()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/tags/create')
            ->type('My New Tag', 'name')
            ->type('my-new-tag', 'slug')
            ->press('submit');

        $this->seeInDatabase('tags', [
            'name' => 'My New Tag',
            'slug' => 'my-new-tag',
        ]);

        $this->seePageIs('dashboard/tags')
            ->see('New tag has been created');

    }

    public function test_if_can_edit_a_tag()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/tags')
            ->click('edit-tag-' . $this->tag->id)
            ->seePageIs('/dashboard/tags/' . $this->tag->id . '/edit')
            ->type('My New Tag', 'name')
            ->type('my-new-tag', 'slug')
            ->press('submit');

        $createdTag = Tag::find($this->tag->id);

        $this->assertNotEquals($this->tag->name, $createdTag->name);
        $this->assertNotEquals($this->tag->slug, $createdTag->slug);

        $this->seePageIs('/dashboard/tags/' . $this->tag->id . '/edit')
            ->see('Tag has been updated');
    }

    public function test_if_can_delete_a_tag()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/tags')
            ->press('delete-tag-' . $this->tag->id)
            ->dontSeeInDatabase('tags', [
                'name' => $this->tag->name,
                'slug' => $this->tag->slug,
            ])
            ->see('Tag has been deleted');
    }
}

<?php

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends BrowserKitTest
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
    }

    private $admin;
    private $category;

    public function test_if_can_validate_when_category_exists()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/categories/create')
            ->type($this->category->name, 'name')
            ->type($this->category->slug, 'slug')
            ->press('submit');

        $this->seePageIs('/dashboard/categories/create')
            ->see('The name has already been taken')
            ->see('The slug has already been taken');
    }

    public function test_if_can_create_new_category()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/categories/create')
            ->type('My New Category', 'name')
            ->type('my-new-category', 'slug')
            ->press('submit');

        $this->seeInDatabase('categories', [
            'name' => 'My New Category',
            'slug' => 'my-new-category',
        ]);

        $this->seePageIs('dashboard/categories')
            ->see('New category has been created');

    }

    public function test_if_can_edit_a_category()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/categories')
            ->click('edit-category-' . $this->category->id)
            ->seePageIs('/dashboard/categories/' . $this->category->id . '/edit')
            ->type('My New Category', 'name')
            ->type('my-new-category', 'slug')
            ->press('submit');

        $createdCategory = Category::find($this->category->id);

        $this->assertNotEquals($this->category->name, $createdCategory->name);
        $this->assertNotEquals($this->category->slug, $createdCategory->slug);

        $this->seePageIs('/dashboard/categories/' . $this->category->id . '/edit')
            ->see('Category has been updated');
    }

    public function test_if_can_delete_a_category()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/categories')
            ->press('delete-category-' . $this->category->id)
            ->dontSeeInDatabase('categories', [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ])
            ->see('Category has been deleted');
    }
}

<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends BrowserKitTest
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

        $newUser = factory(App\Models\User::class)->create();
        $newUser->resolveRole(Role::editor()->id);
        $this->user = $newUser;

    }

    private $admin;
    private $user;

    public function test_if_can_validate_if_email_already_exists()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/profile')
            ->type($this->user->email, 'email')
            ->type('password123', 'password')
            ->type('password123', 'password_confirmation')
            ->type('foo', 'first_name')
            ->type('bar', 'last_name')
            ->type('foo bar', 'display_name')
            ->press('submit');

        $this->seePageIs('/dashboard/profile')
            ->see('The email has already been taken');
    }

    public function test_if_can_edit_profile_data()
    {

        $this->actingAs($this->admin)
            ->visit('/dashboard/profile')
            ->type('foo@bar.com', 'email')
            ->type('foo', 'first_name')
            ->type('bar', 'last_name')
            ->type('foo bar', 'display_name')
            ->type('foo bar', 'slug')
            ->press('submit');

        $updatedUser = User::find($this->admin->id);

        $this->assertNotEquals($this->user->email, $updatedUser->email);
        $this->assertNotEquals($this->user->first_name, $updatedUser->first_name);
        $this->assertNotEquals($this->user->last_name, $updatedUser->last_name);
        $this->assertNotEquals($this->user->display_name, $updatedUser->display_name);
        $this->assertNotEquals($this->user->slug, $updatedUser->slug);

        $this->seeInDatabase('users', [
            'email' => 'foo@bar.com',
            'first_name' => 'foo',
            'last_name' => 'bar',
            'display_name' => 'foo bar',
            'slug' => 'foo-bar',
        ]);

    }

}

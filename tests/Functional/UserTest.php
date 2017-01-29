<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends BrowserKitTest
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

    public function test_if_can_validate_when_user_already_exists()
    {
        $role = Role::user();
        $this->actingAs($this->admin)
            ->visit('/dashboard/users/create')
            ->type($this->user->email, 'email')
            ->type('password123', 'password')
            ->type('password123', 'password_confirmation')
            ->type('foo', 'first_name')
            ->type('bar', 'last_name')
            ->type('foo bar', 'display_name')
            ->type('foo bar', 'slug')
            ->select($role->id, 'role')
            ->press('submit');

        $this->seePageIs('/dashboard/users/create')
            ->see('The email has already been taken');
    }

    public function test_if_can_create_new_user()
    {
        $role = Role::editor();
        $this->actingAs($this->admin)
            ->visit('/dashboard/users/create')
            ->type('foo@bar.com', 'email')
            ->type('password123', 'password')
            ->type('password123', 'password_confirmation')
            ->type('foo', 'first_name')
            ->type('bar', 'last_name')
            ->type('foo bar', 'display_name')
            ->type('foo bar', 'slug')
            ->select($role->id, 'role')
            ->press('submit');

        $this->seeInDatabase('users', [
            'email' => 'foo@bar.com',
            'first_name' => 'foo',
            'last_name' => 'bar',
            'display_name' => 'foo bar',
        ]);

        $this->assertTrue(
            User::where('email', 'foo@bar.com')->first()->hasRole($role->name)
        );

        $this->seePageIs('dashboard/users')
            ->see('New user has been created');

    }

    public function test_if_can_edit_user_data()
    {
        $role = Role::user();

        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->click('edit-user-' . $this->user->id)
            ->seePageIs('/dashboard/users/' . $this->user->id . '/edit')
            ->type('foo@bar.com', 'email')
            ->type('foo', 'first_name')
            ->type('bar', 'last_name')
            ->type('foo bar', 'display_name')
            ->type('foo bar', 'slug')
            ->select($role->id, 'role')
            ->press('submit');

        $updatedUser = User::find($this->user->id);

        $this->assertNotEquals($this->user->email, $updatedUser->email);
        $this->assertNotEquals($this->user->first_name, $updatedUser->first_name);
        $this->assertNotEquals($this->user->last_name, $updatedUser->last_name);
        $this->assertNotEquals($this->user->display_name, $updatedUser->display_name);
    }

    public function test_if_can_edit_user_role()
    {
        $currentRoleId = $this->user->getTheHighestRoleId();
        $adminRoleId = Role::admin()->id;

        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->click('edit-user-' . $this->user->id)
            ->seePageIs('/dashboard/users/' . $this->user->id . '/edit')
            ->select($adminRoleId, 'role')
            ->press('submit');

        $updatedUser = $this->user->fresh();
        $this->assertEquals($adminRoleId, $updatedUser->getTheHighestRoleId());
    }

    public function test_if_can_edit_users_password()
    {
        $newPassword = "newpassword123";
        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->click('edit-user-' . $this->user->id)
            ->seePageIs('/dashboard/users/' . $this->user->id . '/edit')
            ->type($newPassword, 'password')
            ->type($newPassword, 'password_confirmation')
            ->press('submit');

        $updatedUser = $this->user->fresh();
        $this->assertTrue(Hash::check($newPassword, $updatedUser->password));
    }

    public function test_if_can_delete_a_user()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->press('delete-user-' . $this->user->id)
            ->dontSeeInDatabase('users', [
                'email' => $this->user->email,
            ])
            ->see('User has been deleted');
    }

    public function test_if_admin_can_impersonate_into_user()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->click('impersonate-user-' . $this->user->id)
            ->seeIsAuthenticatedAs($this->user)
            ->seePageIs('/dashboard')
            ->see('Back to Admin Mode');
    }

    public function test_if_admin_can_return_back_to_admin_mode_after_impersonification()
    {
        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->click('impersonate-user-' . $this->user->id)
            ->seeIsAuthenticatedAs($this->user)
            ->click('back-to-admin-mode')
            ->seeIsAuthenticatedAs($this->admin)
            ->seePageIs('/dashboard');
    }

}

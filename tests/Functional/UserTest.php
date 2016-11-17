<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    protected function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->seed('RolesTableSeeder');
        $newUser = factory(App\Models\User::class)->create();
        $newUser->toggleRole(Role::admin());
        $this->admin = $newUser;
    }

    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    /**
     * The user model.
     *
     * @var App\Models\User
     */
    private $admin;

    public function testIfCanValidateWhenUserAlreadyExists()
    {
        $insertedUser = factory(App\Models\User::class)->create();
        $role = Role::user();
        $this->actingAs($this->admin)
            ->visit('/dashboard/users/create')
            ->type($insertedUser->email, 'email')
            ->type('password123', 'password')
            ->type('password123', 'password_confirmation')
            ->type('foo', 'first_name')
            ->type('bar', 'last_name')
            ->type('foo bar', 'display_name')
            ->select($role->id, 'role')
            ->press('submit');

        $this->seePageIs('/dashboard/users/create')
            ->see('The email has already been taken');
    }

    public function testIfCanCreateNewUser()
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

    public function testIfCanEditAUser()
    {
        $createdUser = factory(App\Models\User::class)->create();
        $id = $createdUser->id;
        $this->actingAs($this->admin)
            ->put(
                '/dashboard/users/' . $id,
                [
                    'email' => 'foooo@barrr.com',
                    'first_name' => 'foooo',
                    'last_name' => 'barrrr',
                    'display_name' => 'foooo barrrr',
                ]

            );

        $updatedUser = User::find($id);

        $this->assertNotEquals($createdUser->email, $updatedUser->email);
        $this->assertNotEquals($createdUser->first_name, $updatedUser->first_name);
        $this->assertNotEquals($createdUser->last_name, $updatedUser->last_name);
        $this->assertNotEquals($createdUser->display_name, $updatedUser->display_name);
    }

    public function testIfCanDeleteAUser()
    {
        $insertedUser = factory(App\Models\User::class)->create();

        $this->actingAs($this->admin)
            ->visit('/dashboard/users')
            ->press('list-user-' . $insertedUser->id)
            ->dontSeeInDatabase('users', [
                'email' => $insertedUser->email,
            ])
            ->see('User has been deleted');
    }

}

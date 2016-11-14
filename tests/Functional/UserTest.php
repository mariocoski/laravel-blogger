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
        $this->user = $newUser;
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
    private $user;

    public function testIfCanCreateNewUser()
    {
        $role = Role::editor();
        $this->actingAs($this->user)
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

    }

}

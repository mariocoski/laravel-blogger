<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    /**
     * The user model.
     *
     * @var App\Models\User
     */
    private $user;
    /**
     * Create the user model test subject.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(App\Models\User::class)->create();
    }


    public function test_if_login_form_validates_empty_form()
    {
        $this->visit('/login')
             ->press('submit')
             ->dontSeeIsAuthenticated()
             ->see('The email field is required')
             ->see('The password field is required');
    }

    public function test_if_login_form_validates_incorrect_credentials()
    {
        $this->visit('/login')
             ->type('wrong_email@foo.com', 'email')
             ->type('wrong_password', 'password')
             ->press('submit')
             ->dontSeeIsAuthenticated()
             ->see('These credentials do not match our records');
    }

    public function test_if_login_correctly()
    {
        $this->visit('/login')
             ->type($this->user->email, 'email')
             ->type('secret', 'password')
             ->press('submit')
             ->seeIsAuthenticatedAs($this->user)
             ->seePageIs('/dashboard');
    }


}

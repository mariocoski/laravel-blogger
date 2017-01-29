<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends BrowserKitTest
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

    public function test_if_login_form_validates_empty_input()
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

    public function test_if_can_login()
    {
        $this->visit('/login')
            ->type($this->user->email, 'email')
            ->type('secret', 'password')
            ->press('submit')
            ->seeIsAuthenticatedAs($this->user)
            ->seePageIs('/dashboard');
    }

    public function test_if_can_logout()
    {
        $this->actingAs($this->user)
            ->visit('/dashboard')
            ->click('logout')
            ->dontSeeIsAuthenticated()
            ->seePageIs('/');
    }

    public function test_if_remind_password_form_validates_empty_input()
    {
        $this->visit('/password/reset')
            ->see('Send Password Reset Link')
            ->press('submit')
            ->see('The email field is required');
    }

    public function test_if_remind_password_form_validates_wrong_email()
    {
        $this->visit('/password/reset')
            ->type('wrong_email@foo.com', 'email')
            ->press('submit')
            ->see('We can\'t find a user with that e-mail address');
    }

    public function test_if_remind_password_form_display_success_image()
    {
        $this->visit('/password/reset')
            ->type($this->user->email, 'email')
            ->press('submit')
            ->see('We have e-mailed your password reset link');
    }

    public function test_if_can_return_to_login_form_from_remind_password_form()
    {
        $this->visit('/password/reset')
            ->click('login')
            ->seePageIs('/login');
    }

    public function test_if_register_form_validates_empty_input()
    {
        $this->visit('/register')
            ->press('submit')
            ->dontSeeIsAuthenticated()
            ->see('The email field is required')
            ->see('The password field is required');
    }

    public function test_if_register_form_validates_email_which_already_exists()
    {
        $this->visit('/register')
            ->type($this->user->email, 'email')
            ->type('secret', 'password')
            ->press('submit')
            ->dontSeeIsAuthenticated()
            ->see('The email has already been taken.');
    }

    public function test_if_register_allow_to_register_properly()
    {
        $this->visit('/register')
            ->type("brand_new_email@blogger.com", 'email')
            ->type('secret', 'password')
            ->press('submit')
            ->seeIsAuthenticated()
            ->seePageIs('/dashboard');
    }

}

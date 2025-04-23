<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogOutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')    // web route '/' //
                    ->assertSee('Modul 3')  // judul //
                    ->clickLink('Log in') // menekan tautan log in //
                    ->assertPathIs('/login') // memastikan route nya ke /login //
                    ->type(field: 'email', value: 'test@gmail.com') // input atribut name email //
                    ->type(field: 'password', value: '123')  // input atribut password //
                    ->press(button: 'LOG IN') // tombol submit LOG IN yang akan mengarahkan ke url /login //
                    ->assertPathIs('/dashboard')
                    ->waitFor('#click-dropdown', 5)
                    ->click('Log Out')
                    ->assertPaths('/');
        });
    }
}

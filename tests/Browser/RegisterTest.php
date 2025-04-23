<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testRegister(): void
    {
        $this->browse(callback: function (Browser $browser) {
            $browser->visit('/')    // web route '/' //
                    ->assertSee('Modul 3')  // judul //
                    ->clickLink('Register') // menekan tautan register //
                    ->assertPathIs('/register') // memastikan route nya ke /register //
                    ->type(field: 'name', value: 'canyud')
                    ->type(field: 'email', value: 'test@gmail.com') // input atribut name email //
                    ->type(field: 'password', value: '123')  // input atribut password //
                    ->type(field: 'password_confirmation', value: '123')
                    ->press(button: 'REGISTER') // tombol submit REGISTER yang akan mengarahkan ke url /login //
                    ->assertPathIs('/dashboard');
        });
    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group shownotes
     */
    public function testShowNotes(): void
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
            // $browser->visit('/dashboard')
                    ->clickLink('Notes')   // menekan tautan Notes
                    ->assertPathIs('/notes') // membuka url /notes setelah mengklik notes
                    ->click('@delete-1') // membuka notes yang ingin dilihat
                    ->assertPathIs('/note/1'); // membuka url show untuk note
        });
    }
}

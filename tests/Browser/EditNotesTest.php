<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editnotes
     */
    public function testEditNotes(): void
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
                    ->click('@edit-1') // membuka notes yang ingin diedit
                    ->assertPathIs('/edit-note-page/1') // membuka url edit-note-page/{id}
                    ->type('title', 'test edit') // mengisi input title menjadi test edit
                    ->type('description', 'test edit deskripsi notes') // mengisi input description menjadi test edit deskri
                    ->press('UPDATE') //mengklik UPDATE
                    ->assertPathIs('/notes'); // redirect ke /notes
        });
    }
}
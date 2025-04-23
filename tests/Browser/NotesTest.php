<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */
    public function testNotes(): void
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
                    ->clickLink('Create Note') // menekan tautan Create Note
                    ->assertPathIs('/create-note') // membuka url /create-note
                    ->type(field: 'title', value: 'Test Notes')  // mengisi field title dengan test notes
                    ->type(field: 'description', value: 'Test Deskripsi Notes') // mengisi field deskripsi dengan test deskripsi notes
                    ->press("CREATE") // menekan create
                    ->assertPathIs('/notes'); //redirect ke /notes
        });
    }
}
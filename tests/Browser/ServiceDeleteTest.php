<?php

namespace Tests\Browser;

use App\Constantes\Constantes;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ServiceDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDeleteService()
    {

        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $service = Service::factory()->create();
            $browser->visit('/login')
                ->pause(3000)
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->pause(2000)
                ->assertPathIs('/service')
                ->visit('/service/delete/'.$service->id)
                ->pause(1000)
                ->assertPathIs('/service')
                ->assertSee(Constantes::SUCESSO_DELETE_SERVICE)
                ->press('OK')
                ->pause(1000);

        });
    }
}

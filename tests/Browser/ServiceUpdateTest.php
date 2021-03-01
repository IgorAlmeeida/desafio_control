<?php

namespace Tests\Browser;

use App\Constantes\Constantes;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ServiceUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUpdateService()
    {

        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $service = Service::factory()->create();
            $serviceUpdate = Service::factory()->make();
            $browser->visit('/login')
                ->pause(3000)
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->pause(2000)
                ->assertPathIs('/service')
                ->visit('/service/update/'.$service->id)
                ->pause(1000)
                ->type('descricao', $serviceUpdate->descricao)
                ->type('valor', $serviceUpdate->valor)
                ->press('Editar')
                ->pause(1000)
                ->assertSee(Constantes::SUCESSO_UPDATE_SERVICE)
                ->press('OK')
                ->pause(1000);

        });
    }
}

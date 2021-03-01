<?php

namespace Tests\Browser;

use App\Constantes\Constantes;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ServiceCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateService()
    {

        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $service = Service::factory()->make();
            $browser->visit('/login')
                ->pause(3000)
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->pause(3000)
                ->assertPathIs('/service')
                ->visit('/service/create')
                ->pause(1000)
                ->type('descricao', $service->descricao)
                ->type('valor', $service->valor)
                ->press('Cadastrar')
                ->pause(1000)
                ->assertPathIs('/service')
                ->assertSee(Constantes::SUCESSO_CREATE_SERVICE)
                ->press('OK')
                ->pause(1000);

        });
    }


}

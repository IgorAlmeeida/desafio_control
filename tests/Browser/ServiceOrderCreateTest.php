<?php

namespace Tests\Browser;

use App\Constantes\Constantes;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ServiceOrderCreateTest extends DuskTestCase
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
            $serviceOrder = ServiceOrder::factory()->make();
            $browser->visit('/login')
                ->pause(3000)
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->pause(3000)
                ->assertPathIs('/service')
                ->visit('/service_order/')
                ->pause(1000)
                ->visit('/service_order/create')
                ->pause(1000)
                ->select('service_id', $serviceOrder->service->descricao)
                ->type('quantidade', $serviceOrder->quantidade)
                ->type('nome_func', $serviceOrder->nome_func)
                ->type('data', $serviceOrder->data)
                ->type('hora_inicio', $serviceOrder->hora_inicio)
                ->type('hora_fim', $serviceOrder->hora_fim)
                ->type('detalhes', $serviceOrder->detalhes)
                ->press('Cadastrar')
                ->pause(1000)
                ->assertPathIs('/service_order')
                ->assertSee(Constantes::SUCESSO_CREATE_ORDER_SERVICE)
                ->press('OK')
                ->pause(1000);

        });
    }
}

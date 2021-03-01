<?php

namespace Tests\Browser;

use App\Constantes\Constantes;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ServiceOrderDeleteTest extends DuskTestCase
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
            $serviceOrder = ServiceOrder::factory()->create();

            $browser->visit('/login')
                ->pause(3000)
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->pause(3000)
                ->assertPathIs('/service')
                ->visit('/service_order/delete/'.$serviceOrder->id)
                ->pause(1000)
                ->assertPathIs('/service_order')
                ->assertSee(Constantes::SUCESSO_DELETE_ORDER_SERVICE)
                ->press('OK')
                ->pause(1000);

        });
    }
}

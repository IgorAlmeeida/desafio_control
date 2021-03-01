<?php

namespace Tests\Feature;

use App\Constantes\Constantes;
use App\Models\ServiceOrder;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\User;

class ServiceOrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testListServiceOrder(){
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertSee("Ordem de Serviço");

    }

    public function testCreateServiceOrder(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertSee($serviceOrder->quantidade)
            ->assertSee($serviceOrder->nome_func)
            ->assertSee($serviceOrder->hora_inicio)
            ->assertSee($serviceOrder->hora_fim)
            ->assertSee($serviceOrder->detalhes)
            ->assertSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceOrderSemDados(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = [];
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao)
            ->assertDontSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceOrderSemQuantidade(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['quantidade'] = "";
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao)
            ->assertDontSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceSemNomeFuncionario(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['nome_func'] = "";
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao)
            ->assertDontSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceSemData(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['data'] = "";
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao)
            ->assertDontSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceSemHoraInicio(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['hora_inicio'] = "";
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao)
            ->assertDontSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceSemHoraFim(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['hora_fim'] = "";
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao)
            ->assertDontSee($serviceOrder->service->descricao);
    }

    public function testCreateServiceSemDetalhes(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['detalhes'] = "";
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/create',$data)
            ->assertRedirect("/service_order")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_CREATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertSee($serviceOrder->quantidade)
            ->assertSee($serviceOrder->nome_func)
            ->assertSee($serviceOrder->hora_inicio)
            ->assertSee($serviceOrder->hora_fim)
            ->assertSee($serviceOrder->service->descricao);
    }




    public function testUpdadeServiceOrder(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();
        $serviceOrderUpdate = ServiceOrder::factory()->make();

        Session::start();
        $data = $serviceOrderUpdate->toArray();
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect("/service_order")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_UPDATE_ORDER_SERVICE);

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertSee($serviceOrderUpdate->quantidade)
            ->assertSee($serviceOrderUpdate->nome_func)
            ->assertSee($serviceOrderUpdate->hora_inicio)
            ->assertSee($serviceOrderUpdate->hora_fim)
            ->assertSee($serviceOrderUpdate->service->descricao);
    }

    public function testUpdateServiceOrderSemDados(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = [];
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect('/service_order/update/'.$serviceOrder->id,$data)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_ORDER_SERVICE);
    }

    public function testUpdateServiceOrderSemQuantidade(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['quantidade'] = "";
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect('/service_order/update/'.$serviceOrder->id,$data)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_ORDER_SERVICE);
    }

    public function testUpdateServiceSemNomeFuncionario(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['nome_func'] = "";
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect('/service_order/update/'.$serviceOrder->id,$data)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_ORDER_SERVICE);
    }

    public function testUpdateServiceSemData(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['data'] = "";
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect('/service_order/update/'.$serviceOrder->id,$data)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_ORDER_SERVICE);
    }

    public function testUpdateServiceSemHoraInicio(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['hora_inicio'] = "";
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect('/service_order/update/'.$serviceOrder->id,$data)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_ORDER_SERVICE);
    }

    public function testUpdateServiceSemHoraFim(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['hora_fim'] = "";
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect('/service_order/update/'.$serviceOrder->id,$data)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_ORDER_SERVICE);
    }

    public function testUpdateServiceSemDetalhes(){
        $user = User::factory()->create();

        $serviceOrder = ServiceOrder::factory()->create();

        Session::start();
        $data = $serviceOrder->toArray();
        $data['detalhes'] = "";
        $data['idServiceOrder'] = $serviceOrder->id;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service_order/update/'.$serviceOrder->id,$data)
            ->assertRedirect("/service_order")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_UPDATE_ORDER_SERVICE);
    }

    public function testDeleteServiceOrder(){
        $user = User::factory()->create();
        $serviceOrder = ServiceOrder::factory()->create();

        $this->actingAs($user)
            ->get('/service_order/delete/'.$serviceOrder->id)
            ->assertRedirect('/service_order')
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_DELETE_ORDER_SERVICE);;

        $this->actingAs($user)
            ->get('/service_order')
            ->assertStatus(200)
            ->assertDontSee($serviceOrder->nome_func)
            ->assertDontSee($serviceOrder->hora_inicio)
            ->assertDontSee($serviceOrder->hora_fim)
            ->assertDontSee($serviceOrder->detalhes)
            ->assertDontSee($serviceOrder->service->descricao);

    }

    public function testDeleteServiceOrderError(){
        $user = User::factory()->create();
        $serviceOrder = ServiceOrder::factory()->create();
        $id = $serviceOrder->id;
        $serviceOrder->delete();

        $this->actingAs($user)
            ->get('/service_order/delete/'.$id)
            ->assertRedirect('/service_order')
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_DELETE_ORDER_SERVICE);

    }





}

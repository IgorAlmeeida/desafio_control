<?php

namespace Tests\Feature;

use App\Constantes\Constantes;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertLocation('/login');
    }

    public function testListService(){
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/service')
            ->assertStatus(200)
            ->assertSee("Serviços");

    }

    public function testCreateService(){
        $user = User::factory()->create();

        $service = Service::factory()->make();

        Session::start();
        $data = $service->toArray();
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service/create',$data)
            ->assertRedirect("/service")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_CREATE_SERVICE);

    }

    public function testCreateServiceSemDados(){
        $user = User::factory()->create();

        Session::start();
        $data = [];
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service/create',$data)
            ->assertRedirect("/service/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_SERVICE);

    }
    public function testCreateServiceSemDescricao(){
        $user = User::factory()->create();

        $service = Service::factory()->make();

        Session::start();
        $data = $service->toArray();
        $data['_token'] = csrf_token();
        $data['descricao'] = "";

        $this->actingAs($user)
            ->post('/service/create',$data)
            ->assertRedirect("/service/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_SERVICE);

    }

    public function testCreateServiceSemValor(){
        $user = User::factory()->create();

        $service = Service::factory()->make();

        Session::start();
        $data = $service->toArray();
        $data['_token'] = csrf_token();
        $data['valor'] = "";

        $this->actingAs($user)
            ->post('/service/create',$data)
            ->assertRedirect("/service/create")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_CREATE_SERVICE);

    }

    public function testDeleteService(){
        $user = User::factory()->create();
        $service = Service::factory()->create();

        $this->actingAs($user)
            ->get('/service/delete/'.$service->id)
            ->assertRedirect('/service')
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_DELETE_SERVICE);;

        $this->actingAs($user)
            ->get('/service')
            ->assertStatus(200)
            ->assertDontSee($service->descricao);


    }

    public function testDeleteServiceError(){
        $user = User::factory()->create();
        $service = Service::factory()->create();
        $id = $service->id;
        $service->delete();

        $this->actingAs($user)
            ->get('/service/delete/'.$id)
            ->assertRedirect('/service')
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_DELETE_SERVICE);

    }

    public function testUpdateService(){
        $user = User::factory()->create();

        $service = Service::factory()->create();

        Session::start();
        $data = $service->toArray();
        $data['idService'] = $service->id;
        $data['descricao'] = 'TESTE';
        $data['valor'] = 200.00;
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service/update/'.$service->id ,$data)
            ->assertRedirect("/service")
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::SUCESSO_UPDATE_SERVICE);

        $this->actingAs($user)
            ->get('/service')
            ->assertStatus(200)
            ->assertSee('TESTE')
            ->assertSee('R$ 200,00');

    }

    public function testUpdateServiceSemDados(){
        $user = User::factory()->create();

        $service = Service::factory()->create();

        Session::start();
        $data = [];
        $data['_token'] = csrf_token();

        $this->actingAs($user)
            ->post('/service/update/'.$service->id ,$data)
            ->assertRedirect("/service/update/".$service->id)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_SERVICE);

        $this->actingAs($user)
            ->get('/service')
            ->assertStatus(200)
            ->assertSee($service->descricao)
            ->assertSee('R$ '.number_format($service->valor, 2, ',','.'));

    }
    public function testUpdateServiceSemDescricao(){
        $user = User::factory()->create();

        $service = Service::factory()->create();

        Session::start();
        $data = $service->toArray();
        $data['_token'] = csrf_token();
        $data['descricao'] = "";

        $this->actingAs($user)
            ->post('/service/update/'.$service->id ,$data)
            ->assertRedirect('/service/update/'.$service->id)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_SERVICE);

        $this->actingAs($user)
            ->get('/service')
            ->assertStatus(200)
            ->assertSee($service->descricao)
            ->assertSee('R$ '.number_format($service->valor, 2, ',','.'));

    }

    public function testUpdateServiceSemValor(){
        $user = User::factory()->create();

        $service = Service::factory()->create();

        Session::start();
        $data = $service->toArray();
        $data['_token'] = csrf_token();
        $data['valor'] = "";

        $this->actingAs($user)
            ->post('/service/update/'.$service->id ,$data)
            ->assertRedirect('/service/update/'.$service->id)
            ->assertStatus(302)
            ->assertSessionHas('mensagem', Constantes::ERROR_UPDATE_SERVICE);

        $this->actingAs($user)
            ->get('/service')
            ->assertStatus(200)
            ->assertSee($service->descricao)
            ->assertSee('R$ '.number_format($service->valor, 2, ',','.'));

    }




}

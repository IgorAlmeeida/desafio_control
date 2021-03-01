<?php

namespace Tests\Unit;

use App\Models\ServiceOrder;
use App\Validator\ServiceOrderValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class ServiceOrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testServiceOrderValidatorSucesso(){
        $serviceOrder = ServiceOrder::factory()->make();
        $dados = $serviceOrder->toArray();
        ServiceOrderValidator::validate($dados);
        $this->assertTrue(true);
    }

    public function testServiceValidatorErrorServiceId(){
        $this->expectException(ValidationException::class);
        $service = ServiceOrder::factory()->make();
        $dados = $service->toArray();
        $dados['service_id'] = "";
        ServiceOrderValidator::validate($dados);
    }

    public function testServiceValidatorErrorQuantidade(){
        $this->expectException(ValidationException::class);
        $service = ServiceOrder::factory()->make();
        $dados = $service->toArray();
        $dados['quantidade'] = "";
        ServiceOrderValidator::validate($dados);
    }

    public function testServiceValidatorErrorNomeFuncionario(){
        $this->expectException(ValidationException::class);
        $service = ServiceOrder::factory()->make();
        $dados = $service->toArray();
        $dados['nome_func'] = "";
        ServiceOrderValidator::validate($dados);
    }

    public function testServiceValidatorErrorData(){
        $this->expectException(ValidationException::class);
        $service = ServiceOrder::factory()->make();
        $dados = $service->toArray();
        $dados['data'] = "";
        ServiceOrderValidator::validate($dados);
    }

    public function testServiceValidatorErrorHoraInicio(){
        $this->expectException(ValidationException::class);
        $service = ServiceOrder::factory()->make();
        $dados = $service->toArray();
        $dados['hora_inicio'] = "";
        ServiceOrderValidator::validate($dados);
    }

    public function testServiceValidatorErrorHoraFim(){
        $this->expectException(ValidationException::class);
        $service = ServiceOrder::factory()->make();
        $dados = $service->toArray();
        $dados['hora_inicio'] = "";
        ServiceOrderValidator::validate($dados);
    }

    public function testGetDescontoIgualZero(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 9;

        $this->assertTrue($servirceOrder->getDesconto() == 1);
    }

    public function testGetDescontoQuantidadeDez(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 10;

        $this->assertTrue($servirceOrder->getDesconto() == 0.1);
    }

    public function testGetDescontoDezPorCento(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 15;

        $this->assertTrue($servirceOrder->getDesconto() == 0.1);
    }
    public function testGetDescontoQuantidadeVinte(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 20;

        $this->assertTrue($servirceOrder->getDesconto() == 0.2);
    }

    public function testGetDescontoVinteCento(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 25;

        $this->assertTrue($servirceOrder->getDesconto() == 0.2);
    }

    public function testGetDescontoQuantidadeTrinta(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 30;

        $this->assertTrue($servirceOrder->getDesconto() == 0.3);
    }

    public function testGetDescontoTrintaCento(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 35;

        $this->assertTrue($servirceOrder->getDesconto() == 0.3);
    }

    public function testGetDescontoMax(){
        $servirceOrder = new ServiceOrder();
        $servirceOrder->quantidade = 100;

        $this->assertTrue($servirceOrder->getDesconto() == 0.3);
    }

}

<?php

namespace Tests\Unit;

use App\Models\Service;
use App\Validator\ServiceValidator;
use App\Validator\ValidationException;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testServiceValidatorSucesso(){
        $service = Service::factory()->make();
        $dados = $service->toArray();
        ServiceValidator::validate($dados);

        $this->assertTrue(true);
    }

    public function testServiceValidatorErrorDescricao(){
        $this->expectException(ValidationException::class);
        $service = Service::factory()->make();
        $dados = $service->toArray();
        $dados['descricao'] = "";
        ServiceValidator::validate($dados);

    }

    public function testServiceValidatorErrorValor(){
        $this->expectException(ValidationException::class);
        $service = Service::factory()->make();
        $dados = $service->toArray();
        $dados['valor'] = "";
        ServiceValidator::validate($dados);
    }


}

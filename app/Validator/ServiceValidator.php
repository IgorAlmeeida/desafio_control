<?php


namespace App\Validator;


use App\Models\Service;

class ServiceValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, Service::$rules, Service::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Servico");
        }
        return $validator;
    }
}

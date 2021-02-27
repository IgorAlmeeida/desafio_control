<?php


namespace App\Validator;

use App\Models\ServiceOrder;

class ServiceOrderValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, ServiceOrder::$rules, ServiceOrder::$messages);
        if(!$validator->errors()->isEmpty()){
            throw new ValidationException($validator, "Erro na validação do Servico");
        }
        return $validator;
    }
}

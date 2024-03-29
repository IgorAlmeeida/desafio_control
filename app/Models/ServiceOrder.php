<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'quantidade',
        'nome_func',
        'data',
        'hora_inicio',
        'hora_fim',
        'detalhes'
    ];

    public static $rules = [
        'service_id' => 'required',
        'quantidade' => 'required|numeric',
        'nome_func' => 'required|min:5',
        'data' => 'required|date',
        'hora_inicio' => 'required',
        'hora_fim' => 'required',
        'detalhes' =>'nullable'
    ];
    public static $messages = [
        'service_id.*' => 'Este deve ser selecionado.',
        'quantidade.*' => 'Este campo é obrigatório e deve ser numérico.',
        'nome_func.*' => 'Este campo é obrigatório. Por favor, informe o nome do funcionário.',
        'data.*' => 'Este campo é obrigatório. Por favor, informe uma data válida.',
        'hora_inicio.*' => 'Este campo é obrigatório. Por favor, informe o horário de início do serviço.',
        'hora_fim.*' => 'Este campo é obrigatório. Por favor, informe o horário de término do serviço.',
        'detalhes.*' =>'Por favor, descreva com mais detalhes o serviço.'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service')->withTrashed();
    }

    public function getDesconto(){
        if($this->quantidade >= 10 && $this->quantidade < 20){
            return 0.1;
        }
        else if ($this->quantidade >= 20 && $this->quantidade < 30){
            return 0.2;
        }
        else if ($this->quantidade >= 30){
            return 0.3;
        }
        else {
            return 1;
        }
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['descricao', 'valor'];

    public static $rules = [
        'descricao' => 'required|min:3',
        'valor' => 'required|numeric',
    ];
    public static $messages = [
        'descricao.*' => 'A descrição é obrigatória',
        'valor.*' => 'O valor é obrigatório e deve ser numérico'
    ];

    public function serviceOrders(){
        return $this->hasMany('App\Models\ServiceOrder');
    }
}

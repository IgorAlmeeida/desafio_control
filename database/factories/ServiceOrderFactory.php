<?php

namespace Database\Factories;

use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service =  self::factoryForModel('Service')->create();
        $horaFim = $this->faker->time('H:i:s','now');
        $horaInicio = $this->faker->time('H:i:s',$horaFim);

        return [
            'service_id' => $service->id,
            'quantidade' => $this->faker->numberBetween(),
            'nome_func' => $this->faker->firstName,
            'data' => $this->faker->date(),
            'hora_inicio' => $horaInicio,
            'hora_fim' => $horaFim,
            'detalhes' => $this->faker->paragraph(3),
        ];
    }
}

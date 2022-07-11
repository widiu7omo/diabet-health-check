<?php

namespace Database\Factories;

use App\Models\PolaObat;
use Illuminate\Database\Eloquent\Factories\Factory;

class PolaObatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PolaObat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'obat' => $this->faker->word,
        'jumlah' => $this->faker->randomDigitNotNull,
        'anjuran' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

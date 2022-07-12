<?php

namespace Database\Factories;

use App\Models\JadwalCheckup;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalCheckupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JadwalCheckup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checkup' => $this->faker->word,
        'tgl_checkup' => $this->faker->word,
        'lokasi' => $this->faker->text,
        'catatan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

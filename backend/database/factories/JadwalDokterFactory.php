<?php

namespace Database\Factories;

use App\Models\JadwalDokter;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalDokterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JadwalDokter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hari' => $this->faker->word,
        'jam_mulai' => $this->faker->word,
        'jam_selesai' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemeriksaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemeriksaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pemeriksaan' => $this->faker->word,
        'tgl_periksa' => $this->faker->word,
        'detail_pembahasan' => $this->faker->word,
        'hasil_diagnosa' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

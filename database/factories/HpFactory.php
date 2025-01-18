<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class HpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'tanggalRilis' => $this->faker->year(),
            'harga' => $this->faker->randomNumber(4, true),
            'jaringan' => $this->faker->word(),
            'dimensi' => $this->faker->randomFloat(),
            'berat' => $this->faker->randomDigit(),
            'ukuranLayar' => $this->faker->randomDigit(),
            'refreshRate' => $this->faker->randomNumber(3, true),
            'resolusi' => $this->faker->randomNumber(4, true),
            'proteksiLayar' => $this->faker->word(),
            'chipset' => $this->faker->word(),
            'cpu' => $this->faker->word(),
            'gpu' => $this->faker->word(),
            'ram' => $this->faker->randomDigit(),
            'memori' => $this->faker->randomNumber(3, true),
            'kameraBelakang' =>$this->faker->randomDigit(1,3),
            'kameraMpBelakang' => $this->faker->randomNumber(2, true),
            'kameraDepan' =>$this->faker->randomDigit(1,2),
            'kameraMpDepan' => $this->faker->randomNumber(2, true),
            'bluetooth' =>$this->faker->randomDigit(5,6),
            'infrared' => $this->faker->randomElement(['yes', 'no']),
            'nfc' => $this->faker->randomElement(['yes', 'no']),
            'gps' =>$this->faker->randomDigit(5,6),
            'usb' => $this->faker->word(),
            'jenisBaterai' => $this->faker->word(),
            'kapasitasBaterai' => $this->faker->randomNumber(4, true),
            'fiturCas' => $this->faker->word(),
            'os' => $this->faker->randomDigit(),
            'warna' => $this->faker->safeColorName(),
            'speaker' => $this->faker->word(),
            'user_id' => mt_rand(1,3),
            'link' => $this->faker->word(),
        ];
    }
}

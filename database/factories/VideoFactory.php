<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'descripcion' => $this->faker->RandomElement(['Terror','Humor','Documental','Musical','Politica']),
            'autor' =>$this->faker->RandomElement(['CoalChambel','VirgenMaria','Jhon','Roberto','Pepe','CristianoRonaldo']),
            'url' =>$this->faker->word(),
            'visitas' =>$this->faker->numberBetween(1,500),
            'urlMiniatura' =>$this->faker->word(),
            'idUsuario'=>$this->faker->numberBetween(1,500)

        ];
    }
}

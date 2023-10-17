<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public $i = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $country = fake()->randomElement(['UK', 'US', 'CN']);
        $weight = fake()->randomFloat(null, 0.1, 5);
        $name = $faker->productName;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->text(100),
            'photo' => fake()->imageUrl(650, 650, 'Blouse', true, "Blouse-" . ++$this->i, false, 'png'),
            'price' => fake()->numberBetween(100, 500),
            'avaliable' => 'Avaliable',
            'shiping_from' => $country,
            'shiping_price' => (($weight * 1000) / 100) * config('shiping')[$country],
            'weight' => $weight,
            'quantity' => fake()->numberBetween(5, 8),
            'category_id' => 3,
        ];
    }
}

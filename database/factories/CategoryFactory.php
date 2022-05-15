<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->jobTitle();
        $namArr=explode(' ',$name);
        $name=trim($namArr[0]);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name)
        ];
    }
}
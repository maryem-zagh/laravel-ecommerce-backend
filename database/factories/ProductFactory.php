<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
        public function definition()
        {
            
            // $productSuffixes= ['Table','Chair','Glasses'];
            // $name=$this->faker->company(). ' '. Arr::random($productSuffixes);
            // $namArr=explode(' ',$name);
            // $name=trim($namArr[0]);
            // return [
            //     'name'=>$name,
            //     'slug'=>Str::slug($name),
            //     'description'=>$this->faker->realText(320),
            //     'price'=>$this->faker->numberBetween(1000,100000)
            // ];
        }
     
}

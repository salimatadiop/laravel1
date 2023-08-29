<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\etudiant>
 */
class etudiantFactory extends Factory
{
    protected $model = etudiant::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' =>$this -> faker->lastName,
            'prenom' => $this -> faker->firstName(),
            'classe_id' => rand(1,7),
            
        ];        
    }
}

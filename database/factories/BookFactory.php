<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->words(rand(1, 5), true),
            'description' => fake()->realText(),
            'category' => fake()->randomElement(['Fiction', 'Non-fiction', 'Other']),
            'isbn' => fake()->numerify('###-#####-####'),
            'file_url' => UploadedFile::fake()->create('seeder.pdf')->store('uploads'),
        ];
    }
}

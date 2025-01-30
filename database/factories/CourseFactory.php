<?php

namespace Database\Factories;
use App\Models\Course;
use App\Models\Teacher; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\courses>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'course_name' => $this->faker->word(),
        'teacher_id' => Teacher::factory(),
    ];
}
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ContactInfo;
use App\Models\Employee;

class ContactInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactInfo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'email' => $this->faker->safeEmail(),
            'employee_id' => Employee::factory(),
        ];
    }
}

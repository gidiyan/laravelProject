<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \DB::table('users')->pluck('id');
        return [
            'first_name' => $this->faker->unique()->word(),
            'last_name' => $this->faker->unique()->word(),
            'phone' => $this->faker->e164PhoneNumber,
            'location' => $this->faker->text,
            'bio' => $this->faker->text,
            'user_id' => $this->faker->randomElement($users)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        $image = $this->faker->image();
//        $imageFile = new File($image);

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'logo' => $this->faker->imageUrl(400, 300),
//            'logo' => $this->faker->image('public/storage/images', 640,480, null, false ),
            'website' => $this->faker->domainName
        ];
    }
}

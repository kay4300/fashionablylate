<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // お問い合わせ内容をcategory_idごとに変える
        $categoryId = $this->faker->randomElement([1, 2, 3, 4, 5]);
        $detailsByCategory = [
            1 => '不在の場合は宅配ボックスに入れてください。',
            2 => 'MサイズをLサイズに交換してください。',
            3 => '電源が入りません。',
            4 => '定休日はありますか。',
            5 => '登録のアドレスを変更したいです。',
        ];

        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->sentence,
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'detail' => $detailsByCategory[$categoryId] ?? 'お問い合わせ内容です。',
            // 'detail' => $this->faker->paragraph,
            //
        ];
    }
}

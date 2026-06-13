<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionCategory;

class TransactionCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            ['category_name' => 'Sales', 'type' => 'income'],
            ['category_name' => 'Investment', 'type' => 'income'],
            ['category_name' => 'Loan', 'type' => 'income'],
            ['category_name' => 'Other Income', 'type' => 'income'],

            ['category_name' => 'Salary', 'type' => 'expense'],
            ['category_name' => 'Fuel', 'type' => 'expense'],
            ['category_name' => 'Transportation', 'type' => 'expense'],
            ['category_name' => 'Internet', 'type' => 'expense'],
            ['category_name' => 'Electricity', 'type' => 'expense'],
            ['category_name' => 'Seed', 'type' => 'expense'],
        ];

        foreach ($categories as $category) {
            TransactionCategory::firstOrCreate($category);
        }
    }
}

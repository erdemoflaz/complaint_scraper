<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_names = ['karo', 'banyo', 'rezervuar', 'şifon', 'panelli duş teknesi', 'klozet', 'jakuzi',
            'tuvalet taşı', 'musluk', 'duş başlığı', 'taş', 'gömme rezervuar', 'taharet musluğu'];

        foreach ($product_names as $product_name) {
            Product::create([
                'name' => $product_name
            ]);
        }
    }
}

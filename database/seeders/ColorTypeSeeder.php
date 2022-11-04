<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_colors = ['siyah', 'beyaz', 'gri', 'füme', 'turuncu', 'kırmızı', 'yeşil', 'mavi', 'mor', 'bordo', 'krem', 'eflatun',
            'pembe', 'sarı', 'bej', 'kahverengi', 'turkuaz'];

        foreach ($product_colors as $product_color) {
            Color::create([
                'name' => $product_color
            ]);
        }
    }
}

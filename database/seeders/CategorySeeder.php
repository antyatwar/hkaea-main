<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => [
                'en' => 'Uncategorized',
                'zh-hk' => '未分類',
            ],
            'slug' => 'uncategorized',
        ]);

        $categories = [
            [
                'en' => 'Exchange',
                'zh-hk' => '交流活動',
            ],
            [
                'en' => 'Performance',
                'zh-hk' => '表演',
            ],
            [
                'en' => 'School',
                'zh-hk' => '學校',
            ],
            [
                'en' => 'Cooperation',
                'zh-hk' => '合作/義工',
            ],
            [
                'en' => 'Exhibition',
                'zh-hk' => '展覽',
            ],
            [
                'en' => 'Category A',
                'zh-hk' => '類別 A',
            ],
            [
                'en' => 'Category B',
                'zh-hk' => '類別 B',
            ],
            [
                'en' => 'Category C',
                'zh-hk' => '類別 C',
            ],
            [
                'en' => 'Category D',
                'zh-hk' => '類別 D',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => Str::slug($category['en']),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $data = [
            [
                'name' => 'Tin công nghệ'
            ],
            [
                'name' => 'Khám phá'
            ],
            [
                'name' => 'S-Games'
            ],
            [
                'name' => 'Tư vấn'
            ],
            [
                'name' => 'Thị trường'
            ],
            [
                'name' => 'Thủ thuật'
            ],
            [
                'name' => 'Khuyến mãi'
            ],
        ];
        BlogCategory::insert($data);
    }
}

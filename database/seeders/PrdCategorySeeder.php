<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PrdCategory;
class PrdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Điện Thoại"
            ],
            [
                "name" => "Tablet"
            ],
            [
                "name" => "Laptop"
            ],
            [
                "name" => "Phụ kiện"
            ],
            [
                "name" => "Tivi"
            ],
        ];
        PrdCategory::insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Manufacturer;
class ManufacturerSeeder extends Seeder
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
                'name' => 'iphone',
                'logo' => 'iphone.jpg'
            ],
            [
                'name' => 'samsung',
                'logo' => 'samsung.jpg'

            ],
            [
                'name' => 'xiaomi',
                'logo' => 'xiaomi.jpg'

            ],
            [
                'name' => 'oppo',
                'logo' => 'oppo.jpg'

            ],
            [
                'name' => 'vivo',
                'logo' => 'vivo.jpg'

            ],
            [
                'name' => 'nokia',
                'logo' => 'nokia.jpg'

            ],
            [
                'name' => 'asus',
                'logo' => 'asus.jpg'

            ],
            [
                'name' => 'nubia',
                'logo' => 'nubia.jpg'

            ],
            [
                'name' => 'one plus',
                'logo' => 'oneplus.jpg'

            ],
            [
                'name' => 'Dell',
                'logo' => 'Dell.jpg'
            ],
            [
                'name' => 'HP',
                'logo' => 'HP.jpg'

            ],
            [
                'name' => 'Huawei',
                'logo' => 'Huawei.jpg'

            ],
            [
                'name' => 'Macbook',
                'logo' => 'macbook.jpg'

            ],
            [
                'name' => 'LG',
                'logo' => 'LG.jpg'

            ],
            [
                'name' => 'MSI',
                'logo' => 'MSI.jpg'

            ],
            [
                'name' => 'Realme',
                'logo' => 'realme.jpg'

            ],
            [
                'name' => 'Sony',
                'logo' => 'sony.jpg'

            ],
        ];
        Manufacturer::insert($data);
    }
}

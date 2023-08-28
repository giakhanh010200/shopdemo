<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PaymentSeeder extends Seeder
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
                "name" => "Tiền mặt"
            ],
            [
                "name" => "VNPAY"
            ],
            [
                "name" => "MOMO"
            ],
            [
                "name" => "ZaloPay"
            ],
            [
                "name" => "Chuyển khoản"
            ]
        ];
        Payment::insert($data);
    }
}

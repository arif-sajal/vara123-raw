<?php

use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            ['code'=>123456,'discount_type'=>'flat','amount'=>25],
            ['code'=>654321,'discount_type'=>'percent','amount'=>25],
        ];

        \App\Models\Coupon::insert($coupons);
    }
}

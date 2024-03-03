<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::factory()->create([
            'code' => 'LEARN2024',
            'description' => 'Get 20% off on all courses.',
            'type' => 'percentage',
            'value' => 20,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'SKILLSHARE10',
            'description' => 'Get 10% off on annual membership + 7 days free trial.',
            'type' => 'percentage',
            'value' => 10,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
            'free_trial_days' => 7,
        ]);

        Coupon::factory()->create([
            'code' => 'STUDENT50',
            'description' => 'Get 50% off for students.',
            'type' => 'percentage',
            'value' => 50,
            'max_uses' => 100, // Example maximum uses
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'FIRSTCOURSEFREE',
            'description' => 'Get your first course for free!',
            'type' => 'fixed_amount',
            'value' => 0,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'FREEMONTH',
            'description' => 'Get one month free subscription.',
            'type' => 'fixed_amount',
            'value' => 0,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'PRO25',
            'description' => 'Get 25% off on professional courses.',
            'type' => 'percentage',
            'value' => 25,
            'max_uses' => 200, // Example maximum uses
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'MEMBERSHIP2024',
            'description' => 'Exclusive membership offer for 2024.',
            'type' => 'percentage',
            'value' => 15,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'SPRINGSALE',
            'description' => 'Spring sale: Get 30% off on all courses.',
            'type' => 'percentage',
            'value' => 30,
            'max_uses' => null,
            'expiry_date' => '2024-04-30',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'TEACHERDISCOUNT',
            'description' => 'Special discount for teachers: 20% off.',
            'type' => 'percentage',
            'value' => 20,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

        Coupon::factory()->create([
            'code' => 'WELCOME10',
            'description' => 'Welcome offer: Get 10% off on your first purchase.',
            'type' => 'percentage',
            'value' => 10,
            'max_uses' => null,
            'expiry_date' => '2024-12-31',
            'is_redeemable' => true,
        ]);

    }
}

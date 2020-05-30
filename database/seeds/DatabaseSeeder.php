<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(CustomerTableSeeder::class);

        $this->call(ConfigTableSeeder::class);
        $this->call(MeasurementTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);

        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);

        $this->call(AmenityTableSeeder::class);
        $this->call(BillingTypeTableSeeder::class);
        $this->call(ManufacturerTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(VehicleModelTableSeeder::class);

        $this->call(PropertyTypeTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(PropertyAmenityTableSeeder::class);

        $this->call(PropertyVehicleTableSeeder::class);
        $this->call(PropertyRoomTableSeeder::class);
        $this->call(RoomBedTableSeeder::class);
        $this->call(PropertySpotTableSeeder::class);
        $this->call(CompatibleSpotVehicleTableSeeder::class);
        $this->call(BillingTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(CouponTableSeeder::class);
    }
}

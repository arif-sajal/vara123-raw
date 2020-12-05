<?php

use Illuminate\Database\Seeder;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Accommodation',
                'identity' => 'accommodation',
                'item' => 'Room',
                'featured_image' => 'system/accommodation.jpg',
                'property_featured_image_not_found' => 'system/no-accommodation.jpg',
                'title' => 'Ready To Stay Accommodation',
                'subtitle' => 'Millions of hosts are ready to share their accommodation with you.',
                'icon' => 'home',
                'marker' => 'system/map-pins/accommodation.png'
            ],
            [
                'name' => 'Parking Lot',
                'identity' => 'parking_lot',
                'item' => 'Spot',
                'featured_image' => 'system/parking.jpg',
                'property_featured_image_not_found' => 'system/no-parking-lot.jpg',
                'title' => 'Find Nearest Parking Spot',
                'subtitle' => 'Find your nearest parking spots, and park your favorite vehicle without any hassle.',
                'icon' => 'bacon',
                'marker' => 'system/map-pins/parking-lot.png'
            ],
            [
                'name' => 'Vehicle Rental',
                'identity' => 'vehicle_rental',
                'item' => 'Vehicle',
                'featured_image' => 'system/car-rental.jpg',
                'property_featured_image_not_found' => 'system/no-vehicle-rental.jpg',
                'title' => 'Your Personal Car As You Want',
                'subtitle' => 'Hire any kind of vehicle on monthly or weekly even hourly whatever you want.',
                'icon' => 'taxi',
                'marker' => 'system/map-pins/vehicle-rental.png'
            ],
        ];

        \App\Models\PropertyType::insert($types);
    }
}

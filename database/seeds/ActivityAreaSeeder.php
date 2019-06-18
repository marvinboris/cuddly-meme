<?php

use Illuminate\Database\Seeder;

class ActivityAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_areas')->delete();
        $activity_areas = [
            "Food",
            "Banking / Insurance",
            "Wood / Paper / Cardboard / Printing",
            "Construction / Building Materials",
            "Chemistry / Parachimy",
            "Trade / Trade / Distribution",
            "Publishing / Communication / Multimedia",
            "Electronics / Electricity",
            "Studies and advice",
            "Pharmaceutical industry",
            "IT / Telecom",
            "Machinery and Equipment / Automotive",
            "Metallurgy / Metal Work",
            "Plastic / Rubber",
            "Business services",
            "Textile / Clothing / Shoes",
            "Transport / Logistics",
        ];

        foreach($activity_areas as $item){
            DB::table('activity_areas')->insert(['name' => $item]);
        }
    }
}

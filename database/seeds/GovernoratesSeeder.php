<?php

use Illuminate\Database\Seeder;
use App\Models\Governorate;

class GovernoratesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Governorate::create([
            'id' => 1,
            'name' => 'القاهرة'
        ]);


        Governorate::create([
            'id' => 2,
            'name' => 'الجيزة'
        ]);



        Governorate::create([
            'id' => 3,
            'name' => 'الأسكندرية'
        ]);



        Governorate::create([
            'id' => 4,
            'name' => 'الدقهلية'
        ]);



        Governorate::create([
            'id' => 5,
            'name' => 'البحر الأحمر'
        ]);



        Governorate::create([
            'id' => 6,
            'name' => 'البحيرة'
        ]);



        Governorate::create([
            'id' => 7,
            'name' => 'الفيوم'
        ]);



        Governorate::create([
            'id' => 8,
            'name' => 'الغربية'
        ]);



        Governorate::create([
            'id' => 9,
            'name' => 'الإسماعلية'
        ]);



        Governorate::create([
            'id' => 10,
            'name' => 'المنوفية'
        ]);



        Governorate::create([
            'id' => 11,
            'name' => 'المنيا'
        ]);



        Governorate::create([
            'id' => 12,
            'name' => 'القليوبية'
        ]);



        Governorate::create([
            'id' => 13,
            'name' => 'الوادي الجديد'
        ]);



        Governorate::create([
            'id' => 14,
            'name' => 'السويس'
        ]);



        Governorate::create([
            'id' => 15,
            'name' => 'اسوان'
        ]);



        Governorate::create([
            'id' => 16,
            'name' => 'اسيوط'
        ]);



        Governorate::create([
            'id' => 17,
            'name' => 'بني سويف'
        ]);



        Governorate::create([
            'id' => 18,
            'name' => 'بورسعيد'
        ]);



        Governorate::create([
            'id' => 19,
            'name' => 'دمياط'
        ]);



        Governorate::create([
            'id' => 20,
            'name' => 'الشرقية'
        ]);



        Governorate::create([
            'id' => 21,
            'name' => 'جنوب سيناء'
        ]);



        Governorate::create([
            'id' => 22,
            'name' => 'كفر الشيخ'
        ]);



        Governorate::create([
            'id' => 23,
            'name' => 'مطروح'
        ]);



        Governorate::create([
            'id' => 24,
            'name' => 'الأقصر'
        ]);



        Governorate::create([
            'id' => 25,
            'name' => 'قنا'
        ]);



        Governorate::create([
            'id' => 26,
            'name' => 'شمال سيناء'
        ]);



        Governorate::create([
            'id' => 27,
            'name' => 'سوهاج'
        ]);
    }
}

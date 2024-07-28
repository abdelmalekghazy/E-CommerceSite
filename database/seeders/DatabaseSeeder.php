<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\product;
class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $categories = [
            ['id'=> 1 ,'name' => 'Sampleproduct'],
            ['id'=> 2 ,'name' => 'Samplect'],
            ['id'=> 3 ,'name' => 'Samplect'],
        ];

        DB::table('categories')->insertOrIgnore($categories);


        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => "Product .$i",
                'description' => "this is product number .$i",
                'price' => rand(10, 1000),
                'quantity' => rand(1,50),
                
            ]);
        }







        
    }
}

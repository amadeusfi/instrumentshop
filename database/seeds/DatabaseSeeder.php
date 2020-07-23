<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Brand;
use App\Product;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
// $this->call(UsersTableSeeder::class);
        Category::create(['name'=>'Electric Guitars','description'=>'Electric Guitars category','image'=>'images/catelecgtr.jpg']);
        Category::create(['name'=>'Electric Bass','description'=>'Electric Bass category','image'=>'images/catelecba.jpg']);
        Category::create(['name'=>'Keyboards','description'=>'Keyboards category','image'=>'images/1593679899.jpg']);


        Brand::create(['name'=>'Yamaha', 'description'=>'Yamaha brand','image'=>'files/bryamaha.jpg'] );
        Brand::create(['name'=>'Fender', 'description'=>'Fender brand','image'=>'files/brfender.jpg'] );
        Brand::create(['name'=>'Casio', 'description'=>'Casio brand','image'=>'files/brfender.jpg'] );




        Product::create([
            'name'=>'Stratocaster',
            'description'=>'This is the description of a product',
            'price'=> rand(500,1000),
            'image'=>'images/catelecgtr.jpg',
            'category_id'=>rand(1,3),
            'brand_id'=>rand(1,3),
//            'order_id' =>0,
        ]);
//
        Product::create([
            'name'=>'Keyboard C',
            'description'=>'This is the description of a product',
            'price'=> rand(500,1000),
            'image'=>'images/catkeyb.jpg',
//            'category_id'=> 2,
            /*'brand_id'=>3,*/
//            'order_id' =>0,
        ]);
//
            Product::create([
            'name'=>'Keyboard C',
            'description'=>'This is the description of a product',
            'price'=> rand(500,1000),
            'image'=>'images/catkeyb.jpg',
//            'category_id'=> 2,
//            'brand_id'=>3,
//            'order_id' =>0,
        ]);

        User::create([
            'name'=>'AmaAdmin',
            'is_admin'=>1,
            'last_name'=>'Figueiredo',
            'first_name'=>'Amadeus',
            'birth_date'=>'1986-06-02',
            'registration_date'=>'2020-07-02',
            'address'=>'zazaa',
            'city'=>'Berlin',
            'plz'=>'12435',
            'country'=>'Germany',
            'phone'=>'01010101',
            'email'=>'ama@gmail.com',
            'password'=>bcrypt('password'),
            'email_verified_at'=>NOW(),
        ]);
    }
}

<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'SKU' => 'TEST1',
            'name' => 'Test Product 6',
            'slug' => 'test_product-6',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '1',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(1);

        Product::create([
            'SKU' => 'TEST2',
            'name' => 'Test Product 2',
            'slug' => 'test_product-2',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '2',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(2);

        Product::create([
            'SKU' => 'TEST3',
            'name' => 'Test Product 3',
            'slug' => 'test_product-3',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '3',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(3);

        Product::create([
            'SKU' => 'TEST4',
            'name' => 'Test Product 4',
            'slug' => 'test_product-4',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '4',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(1);

        Product::create([
            'SKU' => 'TEST5',
            'name' => 'Test Product 5',
            'slug' => 'test_product-5',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(4);

        Product::create([
            'SKU' => 'TEST100',
            'name' => 'Test Product 100',
            'slug' => 'test_product-100',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(1);

        Product::create([
            'SKU' => 'TEST7',
            'name' => 'Test Product 7',
            'slug' => 'test_product-7',
            'details' => '17 inch, laptop',
            'price' => '19099',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(2);

        Product::create([
            'SKU' => 'TEST8',
            'name' => 'Test Product 8',
            'slug' => 'test_product-8',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(4);

        Product::create([
            'SKU' => 'TEST9',
            'name' => 'Test Product 9',
            'slug' => 'test_product-9',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(3);

        Product::create([
            'SKU' => 'TEST10',
            'name' => 'Test Product 10',
            'slug' => 'test_product-10',
            'details' => '15 inch, laptop',
            'price' => '15999',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(3);

        Product::create([
            'SKU' => 'TEST11',
            'name' => 'Test Product 11',
            'slug' => 'test_product-11',
            'details' => '15 inch, laptop',
            'price' => '1999',
            'QTY' => '5',
            'description' => 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.',
        ])->categories()->attach(1);
    }
}

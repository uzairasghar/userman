<?php

use Illuminate\Database\Seeder;
use App\Products;

class addUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'name' => 'Samsung',
            'description' => 'Galaxy S10',
            'price' => '60000',
        ]);
    }
}

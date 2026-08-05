<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::insert([
            [
                'nama_produk' => 'Laptop ASUS',
                'harga'       => 7500000,
                'deskripsi'   => 'Laptop untuk kerja',
                'stok'        => 10,
                'gambar'      => 'laptop.jpg',
                'category_id' => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_produk' => 'Kaos Polos',
                'harga'       => 100000,
                'deskripsi'   => 'Kaos cotton combed',
                'stok'        => 20,
                'gambar'      => 'kaos.jpg',
                'category_id' => 2,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_produk' => 'Makanan Ringan',
                'harga'       => 15000,
                'deskripsi'   => 'Snack enak',
                'stok'        => 50,
                'gambar'      => 'snack.jpg',
                'category_id' => 3,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}

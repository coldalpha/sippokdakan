<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ikan;
use App\Models\Pokdakan;
use App\Models\Prestasi;
use App\Models\User;
use Database\Factories\PokdakanFactory;
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
        // User::factory(10)->create();
        // User::create([
        //     'name'=>'admin',
        //     'username'=>'admin',
        //     'email'=>'admin@gmail.com',
        //     'level'=>1,
        //     'is_admin'=>true,
        //     'password'=>bcrypt('admin123'),
        // ]);
        // User::create([
        //     'name'=>'erik',
        //     'username'=>'erik',
        //     'email'=>'erik@gmail.com',
        //     'level'=>2,
        //     'is_admin'=>true,
        //     'password'=>bcrypt('admin123'),
        // ]);
        // User::create([
        //     'name'=>'fataa',
        //     'username'=>'fataa',
        //     'email'=>'fataa@gmail.com',
        //     'level'=>2,
        //     'is_admin'=>true,
        //     'password'=>bcrypt('admin123'),
        // ]);
        Pokdakan::factory(10)->create();
        // Category::create([
        //     'nama'=> 'Pembenihan',
        //     'slug'=> 'pembenihan',
        // ]);
        // Category::create([
        //     'nama'=> 'Pembesaran',
        //     'slug'=> 'pembesaran',
        // ]);
        // Category::create([
        //     'nama'=> 'Pembenihan dan Pembesaran',
        //     'slug'=> 'pembenihan-dan-pembesaran',
        // ]);
        // Ikan::create([
        //     'nama'=> 'Lele',
        //     'slug'=> 'lele',
        // ]);
        // Ikan::create([
        //     'nama'=> 'Patin',
        //     'slug'=> 'patin',
        // ]);
        // Ikan::create([
        //     'nama'=> 'Cupang',
        //     'slug'=> 'cupang',
        // ]);
        // Prestasi::create([
        //     'nama'=> 'Kelompok Budiadaya Perikanan Terbaik Kabupaten Batang',
        //     'tahun'=> 2000,
        // ]);
        // Pokdakan::create([
        //     'user_id'=> 1,
        //     'nama_kelompok'=>'Berkah Makmur',
        //     'slug'=>'berkah-makmur',
        //     'excerpt'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, ',
        //     'latar_belakang'=>'<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, quidem obcaecati voluptatum dolore voluptatibus accusantium corporis vero! Nobis facere repudiandae nisi laudantium, magni ipsa vero, dolore sapiente atque libero quae excepturi blanditiis explicabo tempore autem cupiditate </p><p>expedita earum nihil! Rerum vel, iure voluptas inventore quidem aperiam et at magnam est dolorum corporis. Commodi ipsum fuga dolorem architecto, quisquam sequi temporibus totam neque voluptatibus, animi accusamus tempora corrupti tempore laborum quas dolorum expedita similique obcaecati, incidunt asperiores possimus facere! Voluptate maiores ad consequuntur, delectus saepe totam, nulla libero nobis iste repudiandae in ducimus esse odit! Dolores voluptatum eveniet deleniti temporibus pariatur</p>.',
        //     'alamat'=>'Jl Bahagia Utama no. 15',
        //     'ikan_id'=>'1',
        //     'category_id'=>'1',
        //     'jumlah_anggota'=>'10',
        //     'luas_lahan'=>1000,
        //     'total_omzet'=>100000000,
        //     'no_hp'=> '08980890',
        //     'email'=>'admin12@gmaill.com',
        //     'prestasi_id' => '1',
        // ]);
        // Pokdakan::create([
        //     'user_id'=> 1,
        //     'nama_kelompok'=>'Berkah Lestari',
        //     'slug'=>'berkah-lesatri',
        //     'excerpt'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, ',
        //     'latar_belakang'=>'<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, quidem obcaecati voluptatum dolore voluptatibus accusantium corporis vero! Nobis facere repudiandae nisi laudantium, magni ipsa vero, dolore sapiente atque libero quae excepturi blanditiis explicabo tempore autem cupiditate </p><p>expedita earum nihil! Rerum vel, iure voluptas inventore quidem aperiam et at magnam est dolorum corporis. Commodi ipsum fuga dolorem architecto, quisquam sequi temporibus totam neque voluptatibus, animi accusamus tempora corrupti tempore laborum quas dolorum expedita similique obcaecati, incidunt asperiores possimus facere! Voluptate maiores ad consequuntur, delectus saepe totam, nulla libero nobis iste repudiandae in ducimus esse odit! Dolores voluptatum eveniet deleniti temporibus pariatur</p>.',
        //     'alamat'=>'Jl Bahagia Utama no. 15',
        //     'ikan_id'=>'2',
        //     'category_id'=>'1',
        //     'jumlah_anggota'=>'15',
        //     'luas_lahan'=>1501,
        //     'total_omzet'=>105000000,
        //     'no_hp'=>'090890',
        //     'email'=>'admin@gmaill.com',
        //     'prestasi_id' => '1',
        // ]);
        // Pokdakan::create([
        //     'user_id'=> 2,
        //     'nama_kelompok'=>'Lestari Patin',
        //     'slug'=>'lestari-patin',
        //     'excerpt'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, ',
        //     'latar_belakang'=>'<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, quidem obcaecati voluptatum dolore voluptatibus accusantium corporis vero! Nobis facere repudiandae nisi laudantium, magni ipsa vero, dolore sapiente atque libero quae excepturi blanditiis explicabo tempore autem cupiditate </p><p>expedita earum nihil! Rerum vel, iure voluptas inventore quidem aperiam et at magnam est dolorum corporis. Commodi ipsum fuga dolorem architecto, quisquam sequi temporibus totam neque voluptatibus, animi accusamus tempora corrupti tempore laborum quas dolorum expedita similique obcaecati, incidunt asperiores possimus facere! Voluptate maiores ad consequuntur, delectus saepe totam, nulla libero nobis iste repudiandae in ducimus esse odit! Dolores voluptatum eveniet deleniti temporibus pariatur</p>.',
        //     'alamat'=>'Jl Bahagia Utama no. 15',
        //     'ikan_id'=>'2',
        //     'category_id'=>'2',
        //     'jumlah_anggota'=>'11',
        //     'luas_lahan'=>1501,
        //     'total_omzet'=>105000000,
        //     'no_hp'=>'090890',
        //     'email'=>'admin1@gmaill.com',
        //     'prestasi_id' => '1',
        // ]);
        // Pokdakan::create([
        //     'user_id'=> 2,
        //     'nama_kelompok'=>'Gemah Ripah',
        //     'slug'=>'gemah-ripah',
        //     'excerpt'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, ',
        //     'latar_belakang'=>'<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, quidem obcaecati voluptatum dolore voluptatibus accusantium corporis vero! Nobis facere repudiandae nisi laudantium, magni ipsa vero, dolore sapiente atque libero quae excepturi blanditiis explicabo tempore autem cupiditate </p><p>expedita earum nihil! Rerum vel, iure voluptas inventore quidem aperiam et at magnam est dolorum corporis. Commodi ipsum fuga dolorem architecto, quisquam sequi temporibus totam neque voluptatibus, animi accusamus tempora corrupti tempore laborum quas dolorum expedita similique obcaecati, incidunt asperiores possimus facere! Voluptate maiores ad consequuntur, delectus saepe totam, nulla libero nobis iste repudiandae in ducimus esse odit! Dolores voluptatum eveniet deleniti temporibus pariatur</p>.',
        //     'alamat'=>'Jl Bahagia Utama no. 15',
        //     'ikan_id'=>'1',
        //     'category_id'=>'2',
        //     'jumlah_anggota'=>'14',
        //     'luas_lahan'=>1501,
        //     'total_omzet'=>105000000,
        //     'no_hp'=>'090890',
        //     'email'=>'admin2@gmaill.com',
        //     'prestasi_id' => '1',
        // ]);
    }

}

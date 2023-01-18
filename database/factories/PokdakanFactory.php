<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PokdakanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,10),
            'published_at' => now(),
            'nama' => $this->faker->unique()->sentence(3),
            'status' => $this->faker->randomElement(['Pengajuan', 'Disetujui','Ditolak']),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->paragraph(),
            'latar_belakang' => $this->faker->paragraph(mt_rand(5,100)),
            'alamat' => $this->faker->address(),
            'desa' => $this->faker->streetName(),
            'kecamatan' => $this->faker->city(),
            'ikan_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,3),
            'jumlah_anggota' => $this->faker->numberBetween(0, 100),
            'luas_lahan' => $this->faker->numberBetween(500, 1000),
            'total_omzet' => $this->faker->numberBetween(500000000, 1000000000),
            'no_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'prestasi_id' => mt_rand(1,3),
            'lotd'=>$this->faker->longitude($min = -180, $max = 180),
            'latd'=>$this->faker->latitude($min = -90, $max = 90),
        ];
    }
}



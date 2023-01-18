<?php

namespace App\Models;

use App\Models\Pokdakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;
    public function pokdakans()
    {
        return $this->hasMany(Pokdakan::class);
    }
}

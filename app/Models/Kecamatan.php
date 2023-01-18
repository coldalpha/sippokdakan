<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];
    public function desa(){
        return $this->belongsTo(Desa::class);
    }
    public function pokdakans()
    {
        return $this->hasMany(Pokdakan::class);
    }
}

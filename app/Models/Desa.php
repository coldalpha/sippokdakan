<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $fillable = ['kecamatan_id','nama','id'];
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }
    public function pokdakans()
    {
        return $this->hasMany(Pokdakan::class);
    }
}

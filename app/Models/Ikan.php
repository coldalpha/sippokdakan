<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ikan extends Model
{
   use HasFactory, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
    // protected $fillable = ['nama','slug','warna'];
    protected $guarded =['id'];

    public function pokdakans()
    {
        return $this->hasMany(Pokdakan::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

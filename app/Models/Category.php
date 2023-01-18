<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
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
    // protected $fillable = ['nama','slug'];
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

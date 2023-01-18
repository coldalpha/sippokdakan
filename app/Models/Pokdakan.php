<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Pokdakan extends Model
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
    // protected $fillable = ['user_id','nama_kelompok','slug','excerpt',
    // 'latar_belakang','nama_ikan','category_id','no_hp','email'];
    protected $guarded =['id'];
    protected $with = ['category','ikan','petugas'];
    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('nama','like','%'. $filters['search'].'%')
        //               ->orWhere('latar_belakang','like','%'. $filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama','like','%'. $search.'%')
                         ->orWhere('latar_belakang','like','%'. $search.'%');
        });
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function ikan(){
        return $this->belongsTo(Ikan::class);
    }
    public function prestasi(){
        return $this->belongsTo(Prestasi::class);
    }
    public function petugas(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function desa(){
        return $this->belongsTo(Desa::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
// Pokdakan::create([
//     'id_user'=> 2,
//     'nama_kelompok'=>'Berkah Makmur',
//     'slug'=>'berkah-makmur',
//     'excerpt'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, ',
//     'latar_belakang'=>'<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam asperiores excepturi odio facilis voluptas. Optio beatae officiis saepe eos esse? Cupiditate sunt distinctio ea reiciendis repellendus culpa animi fugit explicabo, a nobis deleniti tempore, quidem obcaecati voluptatum dolore voluptatibus accusantium corporis vero! Nobis facere repudiandae nisi laudantium, magni ipsa vero, dolore sapiente atque libero quae excepturi blanditiis explicabo tempore autem cupiditate </p><p>expedita earum nihil! Rerum vel, iure voluptas inventore quidem aperiam et at magnam est dolorum corporis. Commodi ipsum fuga dolorem architecto, quisquam sequi temporibus totam neque voluptatibus, animi accusamus tempora corrupti tempore laborum quas dolorum expedita similique obcaecati, incidunt asperiores possimus facere! Voluptate maiores ad consequuntur, delectus saepe totam, nulla libero nobis iste repudiandae in ducimus esse odit! Dolores voluptatum eveniet deleniti temporibus pariatur</p>.',
//     'nama_ikan'=>'Lele',
//     'category_id'=> 2,
//     'no_hp'=>'080080800',
//     'email'=>'admin12@gmaill.com'
// ])

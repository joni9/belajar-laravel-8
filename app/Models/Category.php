<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use Sluggable;
    use HasFactory;
    //kode untuk database yang mana tidak boleh dimodifikasi yang lain boleh
    protected $guarded = ['id'];
    //relasi one to many with model post
    public function post()
    {
        return $this->hasMany(post::class, 'id_category', 'id');
    }
    //mengubah pencarian berdasarkan slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

     //fungsi input slug otomatis
     public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

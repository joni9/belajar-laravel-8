<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Info extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];
    //mengubah pencarian berdasarkan slug
    public function getRouteKeyName(){
        return 'slug';
    }
    //fungsi input slug otomatis
    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon; 

class post extends Model
{
    use HasFactory;
    use Sluggable;
    //kode untuk database yang mana tidak boleh dimodifikasi yang lain boleh
    protected $guarded = ['id'];
    protected $with = ['category','User'];
    public function ubahAtributTanggal()
    {
        return Carbon::parse($this->attributes['published_at'])->translatedFormat('l, d F Y');
    }
    //relasi one to one category
    public function Category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
    //relasi one to one User
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    //
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'. $search.'%')
            ->orWhere('description', 'like', '%'. $search.'%');
        });
        //filter data post berdasarkan kategori dan search data berdasarkan kategori yang ada
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });
        //filter data post berdasarkan user dan search data berdasarkan user yang ada
        $query->when($filters['User'] ?? false, fn($query, $User)=>
            $query->whereHas('User', fn($query) =>
                $query->where('name', $User)
            )
        );
    }
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

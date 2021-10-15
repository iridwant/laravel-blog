<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['user', 'category'];

    public function scopeSearch($query, array $filters) {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'ilike', '%'. $search . '%')
                ->orWhere('body', 'ilike', '%' . $search . '%');
        });
    }

    public function scopeCategorySearch($query, array $filters) {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                return $query->where('slug', $category);
            });
        });
    }

    public function scopeAuthorSearch($query, array $filters) {
        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('user', function($query) use ($author) {
                return $query->where('username', $author);
            });
        });
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}



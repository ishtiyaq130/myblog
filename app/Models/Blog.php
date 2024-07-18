<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    protected $casts = [
        'publish_at' => 'datetime',
    ];

    protected $fillable = [
        'title', 'thumbnail', 'content', 'user_id', 'category_id', 'status', 'publish_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function comments()
    {
        return $this->belongsTo(Comments::class)->whereNull('parant_id');
    }
}

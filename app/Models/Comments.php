<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'blog_id', 'comment'
    ];


    public function user(){
    return $this->belongsTo(User::class,'user_id', 'user_id');
}


    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}

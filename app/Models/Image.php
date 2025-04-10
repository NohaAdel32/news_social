<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    use HasFactory;
    protected $fillable =[
        'path',
        'post_id',
        'created_at', 'updated_at',
    ];

    public function post(){
        return $this->belongsTo( Post::class, 'post_id');
    }
}

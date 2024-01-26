<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['blog_name', 'author', 'date', 'description', 'image', 'gallery_images'];
    protected $table = 'blogs'; 

}

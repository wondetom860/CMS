<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Post Categories Table
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}

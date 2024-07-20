<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Project extends Model
{
    use HasFactory; 
    protected $fillable = ['title', 'url', 'description', 'category_id'];

    public function getRouteKeyName() 
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Category;

class Project extends Model
{
    use HasFactory; 
    protected $fillable = ['title', 'url', 'description'];

    public function getRouteKeyName() 
    {
        return 'url';
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}

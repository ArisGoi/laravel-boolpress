<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "slug", "content", "category_id"]; //abilita il Max-Assignment

    public function category(){
        return $this->belongsTo("App\Category");
    }
}

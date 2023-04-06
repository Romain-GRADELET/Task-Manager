<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Category;
use App\Models\Tag;

class Task extends Model
{

    public function category(){

        // DOC : https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


}

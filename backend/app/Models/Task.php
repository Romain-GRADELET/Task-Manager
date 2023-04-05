<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;

class Task extends Model
{

    public function category(){

        // DOC : https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
        return $this->belongsTo(Category::class);
    }





}

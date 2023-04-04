<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;

class Task extends Model
{

    public function category(){

        return $this->belongsTo(Category::class ,"category_id");
    }





}

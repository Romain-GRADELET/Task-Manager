<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Task;

class Category extends Model
{
    public function task(){

        return $this->hasMany(Task::class);
    }


}

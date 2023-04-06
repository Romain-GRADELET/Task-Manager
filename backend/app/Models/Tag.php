<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Task;

class Tag extends Model
{

    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
}

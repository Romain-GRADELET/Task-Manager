<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Task;

class Category extends Model
{
    // On indique à Eloquent que notre table categories n'a pas les colonne created_at et updated_at
    // https://laravel.com/docs/9.x/eloquent#timestamps
    public $timestamp = false;

    public function tasks()
    {
        // DOC : https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
        return $this->hasMany(Task::class);
    }


}

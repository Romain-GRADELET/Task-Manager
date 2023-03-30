<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function findAll()
    {
        return Tag::all();
    }

    public function find($id)
    {
        return Tag::findOrFail($id);
    }
}

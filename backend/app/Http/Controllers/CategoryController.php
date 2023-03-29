<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function findAll()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::find($id);
    }

}

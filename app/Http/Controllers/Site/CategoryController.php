<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function category($id)
    // {
    //     $categories =  Category::where('id' , $id)->get();

    //     if(! $categories){
    //         abort(404);
    //     }
        

    //     return view('layouts.site' , compact('categories'));
    // }
}

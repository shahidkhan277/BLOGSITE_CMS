<?php

namespace App\Http\Controllers\Auth\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::all();

        return view('auth.posts.category',compact('categories'));
    }

    public function store(Request $request)
    {
        try{
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        }
            catch (\Exception $ex) { 
                DB::rollBack();
                return back()->withErrors($ex->getMessage());
      }  
      $request->session()->flash('alert-success','Your Post Submitted Sucessfully');
      return to_route('add_category');  
    }

    public function destroy(Request $request,$id)
    {
        $category = Category::find($id);

        if(! $category){
            abort(404);
        }
        $category->delete();

        $request->session()->flash('alert-danger' , 'Post Updated Susccessfully');
            return to_route('add_category');
    }

}

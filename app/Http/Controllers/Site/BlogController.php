<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs =Post::latest()->take(6)->where('status',1)->simplePaginate(6); //Recent Posts
        $allcategories= Category::take(4)->latest()->get();

        //Featured posts
        $latestblogs =Post::latest()->take(2)->where('category_id' ,3 )->get();
        $onelatestblogs =Post::latest()->take(1)->where('category_id' ,1 )->get();
        $twolatestblogs =Post::latest()->take(2)->where('category_id' ,2 )->get();

        $firstcategory =Post::latest()->take(1)->where('category_id' ,1 )->get(); // Single Post from every category
        $secondcategory =Post::latest()->take(1)->where('category_id' ,2 )->get(); 
        $thirdcategory =Post::latest()->take(1)->where('category_id' ,3 )->get(); 
        $fourthcategory =Post::latest()->take(1)->where('category_id' ,4 )->get(); 
        return view('site.index' , compact('blogs' , 'allcategories' , 'latestblogs' ,'onelatestblogs' ,'twolatestblogs' ,'firstcategory','secondcategory','thirdcategory','fourthcategory'));

    }

    public function singleblog($id)
    {
        $blog = Post::find($id);

        if(! $blog){
            abort(404);
        }
        $allcategories= Category::take(4)->latest()->get();
         
        $comments = Comment::where([ ['post_id' , $blog->id] , ['status', 1] ])->simplePaginate(5);

        $latestposts = Post::where('id' ,'!=', $blog->id )->latest()->limit(4)->get();

        $tags = $blog->tags;


        return view('site.single-blog' , compact('blog' , 'latestposts' , 'tags' , 'comments' , 'allcategories'));
    }
    

    public function categories($id)
    {
        $allcategories= Category::take(4)->latest()->get();
        $categories =  Category::where('id' , $id)->get();
        $posts = Post::where('category_id' , $id)->simplePaginate(6);
        

        if(! $categories){
            abort(404);
        }
        

        return view('site.category' , compact('categories' ,'allcategories','posts'));
    }

}


<?php

namespace App\Http\Controllers\Auth\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Posts\CreateRequest;
use App\Http\Requests\CreateRequest as RequestsCreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


   public function dashboard()
   {
    return view('auth.posts.Dashboard');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('auth.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $tags= Tag::all();
        return view('auth.posts.create')->with('categories' , $categories)->with('tags' , $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCreateRequest $request)
    {
        try{
            DB::beginTransaction();
            if($file =$request->file('file')){
               
                $filename= $this->uploadfile($file);
                
                $gallery =$this->gallery_image($filename);

            }

           $post =Post::create([
               'user_id' => auth()->id(),
               'gallery_id' => $gallery->id,
               'title' => $request->title,
               'description' => $request->description,
               'status' => $request->status,
               'category_id' => $request->category
    
           ]);
    
          foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
          }
          DB::commit();
        }
    
        catch (\Exception $ex) { 
                  DB::rollBack();
                  return back()->withErrors($ex->getMessage());
        }
        $request->session()->flash('alert-success','Your Post Submitted Sucessfully');
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('auth.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags= Tag::all();

        return view('auth.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {
        DB::beginTransaction();
        try{
            
            if( $file=$request->file('file'))
            {
                $imageName=null;
                if($post->gallery){
                $imageName = $post->gallery->image;
                $imagePath = public_path('storage/auth/posts/');

                if(file_exists($imagePath. $imageName)){
                    unlink($imagePath. $imageName);
                    
                }
              
            } 
            $filename=$this->uploadfile($file);

            $post->gallery->update([
              'image' => $filename

            ]);

            $post->update([
               'user_id' => auth()->id(),
               'title' => $request->title,
               'description' => $request->description,
               'status' => $request->status,
               'category_id' => $request->category
    
           ]);


            }

 
       foreach ($request->tags as $tag) {
             $post->tags()->attach($tag);
       }
       DB::commit();
     }
 
     catch (\Exception $ex) { 
               DB::rollBack();
               return back()->withErrors($ex->getMessage());
     }
     $request->session()->flash('alert-sucess' , 'Post Updated Susccessfully');
     return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $post = Post::find($id);

        if(! $post){
            abort(404);
        }

        $post->tags()->detach();
        $post->delete();

        $request->session()->flash('alert-danger' , 'Post Updated Susccessfully');
            return to_route('posts.index');
    }

    private function uploadfile($file)
    {
        $filename=rand(100 ,10000).'-'. time().'-'.$file->getClientOriginalName();

        $filePath= public_path('/storage/auth/posts/');

        $file->move($filePath ,$filename);
        
        return $filename;

    }

    private function gallery_image($filename)
    {
        $gallery= Gallery::create([
            'image' => $filename,
          ]);
  
          return $gallery;
    }
}

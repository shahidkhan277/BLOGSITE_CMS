<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function postcomment(CommentRequest $request , $postId)
    {
         if(auth()->check())
         {
            $post =Post::find($postId);

            if(! $post){
                return back()->withErrors('Cant Find The Post, Please Visit Homepage and Tryagain');

            }
            
            Comment::create([
                'post_id' => $postId,
                'user_id' => auth()->id(),
                'comment' => $request->comment
            ]);

            $request->session()->flash('alert-success','Thanks For Comment. Your Comment Will be Visible as Soon as Approved by Admin');

         }
         return back();
    }

    public function showcomment(){
        $comments = Comment::all();
        $replies = CommentReply::all();

        return view('auth.posts.comments', compact('comments' ,'replies'));
    }
    
    public function commentreply(CommentRequest $request , $commentid)
    {
        $comment_id=$commentid;
        $comment = $request->comment;

        CommentReply::create([
         'comment_id' => $comment_id,
         'user_id' => auth()->id(),
         'commentreply' => $comment
        ]);

        $request->session()->flash('alert-success-reply','Thanks For Feedback');
         return back();

    }

    public function commentdestroy(Request $request,$id)
    {
        $comment = Comment::find($id);

        $reply= CommentReply::where('comment_id',$id);


        if(! $comment){
            abort(404);
        }
        $reply->delete();
        $comment->delete();

        $request->session()->flash('alert-danger' , 'Comment Deleted Susccessfully');
            return back();
    }

    public function replydestroy(Request $request,$id)
    {

        $reply= CommentReply::find($id);

        if(! $reply){
            abort(404);
        }
        $reply->delete();
        

        $request->session()->flash('alert-danger-reply' , 'Reply Deleted Susccessfully');
            return back();
    }

    public function approvecomment($id)
    {
        $approve= Comment::findOrFail($id);
        $approve->status = 1; //Approved
        $approve->save();
        return redirect()->back(); 
     }

     public function declinecomment($id)
     {
        $approve= Comment::findOrFail($id);
        $approve->status = 0; //Decline
        $approve->save();
        return redirect()->back();
     }

    
}

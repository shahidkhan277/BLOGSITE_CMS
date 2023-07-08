@extends('layouts.site')
@section('style')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('title' , 'Know !t || Single Blog ')


@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{$blog->gallery->image}}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="post-entry text-center">
            <span class="post-category text-white bg-success mb-3">{{$blog->category->name}}</span>
            <h1 class="mb-4"><a href="#">{{$blog->title}}</a></h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{asset('assets/site/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">{{$blog->user->name}}</span>
              <span>&nbsp;-&nbsp; {{date('d M Y',strtotime($blog->created_at))}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <section class="site-section py-lg">
    <div class="container">
      
      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">
          
          <div class="post-content-body">
            <h1> {{$blog->title}}</h1>
          <div class="row mb-5 mt-5">
            <div class="col-md-12 mb-4">
              <img src="{{$blog->gallery->image}}" alt="Image placeholder" class="img-fluid rounded">
            </div>
          </div>
          <p>{{$blog->description}}</p>
         
          </div>

          
          <div class="pt-5">
            <p>Categories:  <a href="#">{{$blog->category->name}}</a></p>
          </div>


          <div class="pt-5">
          

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form method="POST" action="{{route('postcomment', $blog->id)}}" class="p-5 bg-light">
                  @csrf
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="comment" id="message" cols="20" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
             @if(count($comments) > 0)
            <h3 class="mb-5">{{count($comments)}} Comments</h3>
            <ul class="comment-list">
              @foreach($comments as $comment)
              <li class="comment">
                <div class="vcard">
                  <img src="{{asset('assets/site/images/person_1.jpg')}}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>{{$comment->user->name}}</h3>
                  <div class="meta">{{date('d M Y',strtotime($comment->created_at))}}</div>
                  <p>{{$comment->comment}}</p>
                </div>
                
                
                  @if($comment->commentreplies)
                    @foreach($comment->commentreplies as $reply)
                <div class="comment-body">
                  <h5>Reply By :{{$reply->user->name}}</h5>
                  <div class="meta"><b>{{date('d M Y',strtotime($reply->created_at))}}</b></div>
                  <p>{{$reply->commentreply}}</p>
                </div>
                @endforeach
                @endif
               
               
           
             
                <form method="POST" action="{{route('commentreply', $comment->id)}}">
                  @csrf
                  <span class="show_reply text-primary " style="float:right; cursor: pointer ;">Click To Reply</span>
                  <div class="form-group reply_div">
                    <label for=""><b>Reply</b></label><br>
                    <textarea class="form-control" name="comment" id="comment" cols="80" rows="3" placeholder="Comment Here...."></textarea><br>

                    <button type="submit" class="btn btn-info btn-sm mt-1" style="float: right">Reply</button>
               
              </div>
                 </form>
              </li>

              @endforeach
            </ul>

            <div class="col-lg-12 mt-3">
              {{$comments->links()}} 
             </div>
            @endif
            <!-- END comment-list -->
            
            
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>

         <!-- Popular Posts -->
          <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
                @foreach ($latestposts as $latestpost)
                <li>
                  <a href="">
                    <img src="{{$latestpost->gallery->image}}" alt="Image placeholder" class="mr-4">
                    <div class="text">
                      <h4><a style="color:black !important" href="{{route('single-blog' , $latestpost->id)}}">{{Str::limit($latestpost->title , '30')}}</a></h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>  
                @endforeach
                
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul class="tags">
              @foreach($blog->tags as $tag)
              <li><a href="#">{{$tag->name}}</a></li>
              @endforeach
              
            </ul>
          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

  

    

@endsection

@section('script')
<script>
   $('.reply_div').hide();
  $(document).ready(function(){
       $('.show_reply').click(function(){

        $(this).next('.reply_div').toggle('swing');
        // $('.reply_div').show();
       });
  });

@if(Session::has('alert-success'))
        
swal("Thank You", "For Your Feedback. Your Comment Will be Shown After Admin Approval");

@endif

@if(Session::has('alert-success-reply'))
        
swal("Thank You", "For Your Feedback.");

@endif
</script>
@endsection
@extends('layouts.site')

@section('title' , 'Know it ALL')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          @foreach ($categories as $category)
          <span>Category</span>
          <h3>{{$category->name}}</h3>
          <p>{{$category->description}}</p>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-white">
    <div class="container">
      <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="{{route('single-blog', $post->id)}}"><img src="{{$post->gallery->image}}" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>

            <h2><a href="{{route('single-blog', $post->id)}}">{{$post->title}}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
              <span>{{date('d M Y',strtotime($post->created_at))}}</span>
            </div>
            
              <p>{{Str::limit($post->description , '40')}}</p>
              <p><a href="{{route('single-blog', $post->id)}}">Read More</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row text-center pt-5 border-top">
        <div class="col-md-12">
          <div class="">
            
              {{ $posts->links() }}
         
          </div>
        </div>
    </div>
  </div>
</div>
  
  
@endsection
@extends('layouts.site')

@section('title','Know !t')

@section('style')

@endsection

@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
          @foreach($latestblogs as $latestblog)
          <a href="{{route('single-blog', $latestblog->id)}}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{$latestblog->gallery->image}}');">
            <div class="text">
              <h2>{{$latestblog->title}}</h2>
              <span class="date">{{date('d M Y',strtotime($latestblog->created_at))}}</span>
            </div>
          </a>

          @endforeach
        
        </div>
        @foreach ($onelatestblogs as $oneblog) 
        <div class="col-md-4">
          <a href="{{route('single-blog', $oneblog->id)}}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{$oneblog->gallery->image}}');">
            
            <div class="text">
              <div class="post-categories mb-3">
                <span class="post-category bg-danger">{{$oneblog->category->name}}</span>
              </div>
              <h2>{{$oneblog->title}}</h2>
              <span class="date">{{date('d M Y',strtotime($oneblog->created_at))}}</span>
            </div>
          </a>
        </div>
        @endforeach
        <div class="col-md-4">
          @foreach ($twolatestblogs as $twoblog)
          <a href="{{route('single-blog', $twoblog->id)}}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{$twoblog->gallery->image}}');">
            
            <div class="text">
              <h2>{{$twoblog->title}}</h2>
              <span class="date">{{date('d M Y',strtotime($twoblog->created_at))}}</span>
            </div>
          </a>
          @endforeach
          
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @if (count($blogs) > 0)
        
          @foreach ($blogs as $blog)
          <div class="col-lg-4 mb-4">
            <div class="entry2 " 
              <a href="{{route('single-blog', $blog->id)}}"><img style="height: 250px; width:300px;" src="{{$blog->gallery->image}}" alt="Image" class="img-fluid rounded" style="width:250px"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-info mb-3">{{$blog->category->name}}</span>
  
              <h2><a href="{{route('single-blog', $blog->id)}}">{{Str::limit($blog->title ,'40')}}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/site/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">{{$blog->user->name}}</a></span>
                <span>{{date('d M Y',strtotime($blog->created_at))}}</span>
              </div>
              
                <p>{{Str::limit($blog->description , '40')}}</p>
                <p><a href="{{route('single-blog', $blog->id)}}">Read More</a></p>
              </div>
            </div>
          </div>               
          @endforeach

        @else
          <h3>No Blogs Has Been Posted Yet .</h3>
        @endif
  
      </div>
      <div class="row text-center pt-5 border-top">
        <div class="col-md-12">
          <div class="">
            <div class="text-dark text-md">
              {{-- {{$blogs->render()}} --}}
              <div class="pagination-wrapper">
                {{ $blogs->links() }}
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">
        
        <div class="col-md-5 order-md-2">
          @foreach ($firstcategory as $first)
          <a href="{{route('single-blog', $first->id)}}" class="hentry img-1 h-100 gradient" style="background-image: url('{{$first->gallery->image}}');">
            <span class="post-category text-white bg-danger">{{$first->category->name}}</span>
            <div class="text">
              <h2>{{$first->title}}</h2>
              <span>{{date('d M Y',strtotime($first->created_at))}}</span>
            </div>
          </a>
              
          @endforeach
        </div>

        <div class="col-md-7">
          @foreach($secondcategory as $second)
          <a href="{{route('single-blog', $second->id)}}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{$second->gallery->image}}');">
            <span class="post-category text-white bg-success">{{$second->category->name}}</span>
            <div class="text text-sm">
              <h2>{{$second->title}}</h2>
              <span>{{date('d M Y',strtotime($second->created_at))}}</span>
            </div>
          </a>
          @endforeach
          <div class="two-col d-block d-md-flex">
            @foreach($thirdcategory as $third)
            <a href="{{route('single-blog', $third->id)}}" class="hentry v-height img-2 gradient" style="background-image: url('{{$third->gallery->image}}');">
              <span class="post-category text-white bg-primary">{{$third->category->name}}</span>
              <div class="text text-sm">
                <h2>{{$third->title}}</h2>
                <span>{{date('d M Y',strtotime($third->created_at))}}</span>
              </div>
            </a>
            @endforeach

            @foreach($fourthcategory as $fourth)
            <a href="{{route('single-blog', $fourth->id)}}" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{$fourth->gallery->image}}');">
              <span class="post-category text-white bg-warning">{{$fourth->category->name}}</span>
              <div class="text text-sm">
                <h2>{{$fourth->title}}</h2>
                <span>{{date('d M Y',strtotime($fourth->created_at))}}</span>
              </div>
            </a>
            @endforeach
          </div>  
          
        </div>
      </div>

    </div>
  </div>

@endsection

@section('script')

 

@endsection
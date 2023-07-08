@extends('layouts.auth')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<style>
  #outer
{

  text-align: center;
}
.inner
{
  display: inline-block;
}
 </style>


@endsection

@section('content')

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Posts</h4>
      </p>
      <div class="table-responsive">
        @if (count($posts) > 0)
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>User</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Created</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              
              </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
            <tr>
                <td><img src="{{$post->gallery->image}}" style="width:50px" alt=""></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{Str::limit($post->description , '12')}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{date('d M Y',strtotime($post->created_at))}}</td>
                <td><label class="badge badge-primary"><b>{{$post->status ==1 ? 'Published' : 'Draft'}}</b></label></td>
                <td id="outer">
                  <a href="{{route ('posts.show' , $post->id)}}" class="btn btn-success inner"><i class="bi bi-eye-fill"></i></a>
                  <a href="{{route ('posts.edit',$post->id)}}" class="btn btn-info inner"><i class="bi bi-file-earmark-text-fill"></i></a> 
                  <form method="POST" action="{{route ('posts.destroy',$post->id)}}" class="inner">
                     @csrf
                     @method('DELETE')
                  
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                  </form >
           
                  {{-- <a  href="" class="btn btn-warning inner"><i class="bi bi-arrow-counterclockwise"></i></a>  --}}
                </td>
                
              </tr>
                
            @endforeach
            </tbody>
            <thead>
              <tr>
                <th>Image</th>
                <th>User</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Created</th>
                <th>Status</th>
                <th class="text-center">Action</th>
               
              </tr>
            </thead>
          </table>
              
          @else
            <h1 class="text-danger">NO POSTS FOUND</h1>
            
        @endif
      </div>
    </div>
  </div>
    
@endsection

@section('script')
<script>
  @if(Session::has('alert-success'))
        
        swal("Good job!", "Data Submitted", "success");
   
        @endif
        @if(Session::has('alert-danger'))
        
        swal("Good job!", "Data Deleted", "Sucessfully");
   
        @endif
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );


</script>
@endsection
@extends('layouts.auth')

@section('style')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
@section('title' , 'Admin || Comments')

@section('content')
<!-- Categoreis table -->
<section>
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Comments</h4>
          </p>
          <div class="table-responsive">
            @if (count($comments) > 0)
            <table id="myTable" class="table">
                <thead>
                  <tr class="text-center">
                    <th>Username</th>
                    <th>Post ID</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th class="text-center">Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                <tr class="text-center">
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->post_id}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->status ==1 ? 'Approved' : 'Declined'}}</td>
                    <td>{{date('d M Y',strtotime($comment->created_at))}}</td>
                    <td id="outer">
                      <form method="POST" action="{{route ('comment_destroy',$comment->id)}}" class="inner">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                      </form>
                      || <a href="{{route ('comment-approve' , $comment->id)}}" type="submit" class="btn-sm btn-info"><i class="bi bi-hand-thumbs-up"></i></a> || <a href="{{route ('comment-decline' , $comment->id)}}" type="submit" class="btn-sm btn-danger"><i class="bi bi-hand-thumbs-down"></i></a>
                    </td>
                    
                  </tr>
                    
                @endforeach
                </tbody>
                <thead>
                  <tr class="text-center">
                    <th>Username</th>
                    <th>Post ID</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th  class="text-center">Action</th>
                   
                  </tr>
                </thead>
              </table>
                  
              @else
                <h1 class="text-danger">No Comments Have Been Found</h1>
                
            @endif
          </div>
        </div>
      </div>
</section>


<!-- Reply Section -->

<section class="mt-5 mb-5">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Comments Replies</h4>
          </p>
          <div class="table-responsive">
            @if (count($replies) > 0)
            <table id="myTable" class="table">
                <thead class="text-center">
                  <tr>
                    <th>Username</th>
                    <th>Comment ID</th>
                    <th>Comment Replie</th>
                    <th>Created</th>
                    <th >Action</th>
                  
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach ($replies as $reply)
                <tr>
                    <td>{{$reply->user->name}}</td>
                    <td>{{$reply->comment_id}}</td>
                    <td>{{$reply->commentreply}}</td>
                    <td>{{date('d M Y',strtotime($reply->created_at))}}</td>
                    <td class="text-center">
                      <form method="POST" action="{{route ('reply_destroy',$reply->id)}}" class="inner">
                         @csrf
                         @method('DELETE')
                        <button  type="submit" class="btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                      </form>
                    </td>
                    
                  </tr>
                    
                @endforeach
                </tbody>
                <thead class="text-center">
                  <tr>
                    <th>Username</th>
                    <th>Post ID</th>
                    <th>Comment</th>
                    <th>Created</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
              </table>
                  
              @else
                <h1 class="text-danger">No Replies Have Been Found</h1>
                
            @endif
          </div>
        </div>
      </div>
</section>

  
@endsection

@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );

@if(Session::has('alert-danger'))
        
swal("Comment Deleted Sucessfully");

@endif

@if(Session::has('alert-danger-reply'))
        
swal("Reply to a Comment Deleted Sucessfully");

@endif

</script>

@endsection
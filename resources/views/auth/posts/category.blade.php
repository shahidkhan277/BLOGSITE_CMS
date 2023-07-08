@extends('layouts.auth')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

@endsection

@section('title' , 'MSK || Categories')

@section('content')

<div class="card-header">
    <h2 class="text-primary">Add Category</h2>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form method="POST" action="{{route('category_store')}}">
    @csrf
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="name" required  value="{{old('name')}}" class="form-control" placeholder="Name">
      </div>

      <div class="form-group">
          <label>Description</label>
          <textarea name="description" required class="form-control" cols="30" rows="3" placeholder="Description">{{old('description')}}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Categoreis table -->
    <section>
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Categories</h4>
              </p>
              <div class="table-responsive">
                @if (count($categories) > 0)
                <table id="myTable" class="table">
                    <thead class="text-center">
                      <tr>
                        <th>Category</th>
                        <th>Description </th> 
                        <th>Created</th>
                        <th >Action</th>
                      
                      </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{Str::limit($category->description , '20')}}</td>
                        <td>{{date('d M Y',strtotime($category->created_at))}}</td>
                        <td id="outer">
                          <form method="POST" action="{{route ('category_destroy',$category->id)}}" class="inner">
                             @csrf
                             @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                          </form>
                        </td>
                        
                      </tr>
                        
                    @endforeach
                    </tbody>
                    <thead class="text-center">
                      <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Created</th>
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
    </section>
    
@endsection


@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );


</script>

@endsection
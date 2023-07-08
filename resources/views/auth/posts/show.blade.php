@extends('layouts.auth')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  
@endsection

@section('content')

<div class="card-header">
    <h2 class="text-primary">View Post</h2>
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
    
      <div class="row">
      <div class="col-xl-12">
      
         
 
         @if($post)
         <table class="table">
             <thead>
               <tr>
                 <th scope="col">Title</th>
                 <td>{{$post->title}}</td>
               </tr>
 
               <tr>
                 <th scope="col">Description</th>
                 <td>{{$post->description}}</td>
               </tr>
               
               <tr>
                 <th scope="col">User</th>
                 <td>{{$post->user->name}}</td>
               </tr>
 
               <tr>
                 <th scope="col">Category</th>
                 <td>{{$post->category->name}}</td>
               </tr>
               
               <tr>
                 <th scope="col">Status</th>
                 <td>{{$post->Status === 1 ? 'Published' : 'Draft'}}</td>
                 
                 
 
 
               </tr>
             </tbody>
           </table>
         @else
               <h1 class="text-center text-danger">No Posts Found </h1>
 
       @endif
       </div>
       </div>
    
@endsection
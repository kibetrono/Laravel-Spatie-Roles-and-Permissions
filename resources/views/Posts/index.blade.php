@extends('layouts.main')

@section('content')
    <h4>List of Posts</h4>
    <div class="card">
      <div class="col-md-12">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ $message }}</strong> 
    </div>


        @elseif($message = Session::get('danger'))

    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
      
    @endif
    
        </div> 

        @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
        <div class="card-header">
          <div class="row">
            <div class="col-md-8">
              <form method="GET" action="{{route('posts.index')}}">
                <div class="form-row align-items-center">
                 
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                      </div>
                      <input type="search" name="search" class="form-control" id="inlineFormInputGroup" placeholder="post Name">
                    </div>
                  </div>
                 
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                  </div>
                </div>
              </form> 
            </div>

            <div class="col-md-2">
                <a href="{{route ('posts.index') }}" class="btn btn-primary mb-2">All Posts</a>
  
              </div>
            {{-- @role("writer")
           
            @endrole --}}

            @can('create post')
            <div class="col-md-2">
              <a href="{{route ('posts.create') }}" class="btn btn-primary mb-2">Create Post</a>

            </div>            
            @endcan
          </div>
          

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th style="width:80%" scope="col">Title</th>
                    <th scope="col"> Action</th>
 
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>
                      @can('edit post')
                      <a href="{{ route ('posts.edit',$post->id) }}" class="btn btn-success">Edit</a>
                      @endcan
                      @can('publish  post')
                      <a href="{{ route ('posts.edit',$post->id) }}" class="btn btn-success">Publish</a>
                      @endcan
                      @can('destroy post')
                      <a href="{{ route ('posts.edit',$post->id) }}" class="btn btn-danger">Delete</a>
                      @endcan

                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
        </div>
    </div>
@endsection
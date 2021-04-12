@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/new-post.css')}}">
<div class="container p-2">

    <!--title start-->
    <div class="row title-container d-flex justify-content-center p-2">
        <h1 class = "title">
            Create new post
        </h1>
    </div>
    <!--title start-->


    
    <div class="row">
    <!--illus start-->
    <div class="col illus-container">
        <img src = "/svg/new-post.svg">

    </div>
    <!--illus end-->


    <!--form start-->
    <div class="col form-container">
        <form action = "/post/store" enctype="multipart/form-data" method="POST">
            {{-- create csrf key --}}
            @csrf

            <div class="form-group">
                <label>Caption</label>
                <textarea required = "true" name = "post-caption" class = "form-control" id = "post-caption">

                </textarea>
              </div>


              <div class="form-group">
                  <label>Image </label>
                <div class="input-group mb-3">
      
                    
                      <input required = "true" type="file" class="" name = "post-image" id="post-image" accept="image/*">
 
                    
                  </div>
              </div>
     
              <button type="submit" class="btn btn-primary">Add new post</button>

        </form>

    </div>

    {{-- form end --}}

    </div>
</div>
@endsection

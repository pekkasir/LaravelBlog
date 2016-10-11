@extends('admin.master')


@section('content')
    <form action="{{ route('admin.edit')}}" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <span style="color:#b94a48">
                {{ $errors->has('title') ? $errors->first('title') : ""}}    
            </span>  
            <input type="text" name="title" id="title" class="form-control"
            value="{{ Request::old('title') ? Request::old('title') : isset($post) ? $post->title : '' }}">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <span style="color:#b94a48">
                {{ $errors->has('author') ? $errors->first('author') : ""}}    
            </span>    
            <input type="text" name="author" id="author" class="form-control"
            value="{{ Request::old('author') ? Request::old('author') : isset($post) ? $post->author : '' }}">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <span style="color:#b94a48">
                {{ $errors->has('body') ? $errors->first('body') : ""}}    
            </span>  
            <textarea name="body" id="body" rows="6" class="form-control">{{ Request::old('body') ? Request::old('body') : isset($post) ? $post->body : '' }}</textarea>
        </div>
        <div class="form-group">
           <input type="submit" name="submit" id="submit" class="btn btn-primary pull-right" value="Save">
           <input type="hidden" value="{{Session::token()}}" name="_token">
           <input type="hidden" value="{{ $post->id }}" name="id" >
       </div>
    </form>
@endsection

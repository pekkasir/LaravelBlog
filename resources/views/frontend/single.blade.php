@extends('layouts.master')


@section('title')
    Single Post
@endsection


@section('content')
   <div class="row">
       <div class="col-sm-6 col-sm-offset-3">
        <h3>{{$post->title}}</h3>
        <span>{{$post->author}} | {{$post->created_at}} </span>
        <p>{{$post->body}}</p>
        <a href="{{ route('frontend.index') }}">Back</a>
    </div>    
   </div>
@endsection


@section('footer')
    Copyright
@endsection
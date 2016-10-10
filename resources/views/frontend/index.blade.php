@extends('layouts.master')


@section('title')
    Blog
@endsection


@section('content')
   <div class="row">
       <div class="col-sm-6 col-sm-offset-3">
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @if(count($posts) == 0)
                <p>No posts were found!</p>
            @else
                @foreach($posts as $post)
                    <h3>{{$post->title}}</h3>
                    <span class="text-muted small">{{$post->author}} | {{$post->created_at->format('d.m.Y h:m')}} </span>
                    <p>{{$post->body}}</p>
                    <a href="{{ route('single', ['id' => $post->id]) }}">Read more</a>
                @endforeach
                
            @endif  
        
    </div>    
   </div>
   <div class="row">
       @if(!empty($posts))
           <div class="col-sm-6 col-sm-offset-3">{{$posts->links()}}</div>  
       @endif  
   </div> 
@endsection


@section('footer')
    Copyright
@endsection
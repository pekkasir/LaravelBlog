@extends('admin.master')


@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }} </div>
    @endif
    <h2>Posts</h2>
    @if(count($posts) == 0)
        <p>No Post were found!</p>
    @else
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td><a href="{{ route('admin.edit.form', ['id' => $post->id]) }}">Edit</a></td>
                </tr>
            @endforeach
        </table>
        @if(!empty($posts))
            {{$posts->links()}}
        @endif
    @endif
@endsection
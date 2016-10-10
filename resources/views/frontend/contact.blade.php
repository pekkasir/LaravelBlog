@extends('layouts.master')


@section('title')
    Contact
@endsection


@section('content')
    @if(Session::has('errors'))
        <div class="alert alert-danger">{{ Session::get('errors') }}</div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-danger">{{ Session::get('success') }}</div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors as $error)
                    <li>$error</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-sm-6 col-sm-offset-3">
        <h3>Contact Form</h3>
        <form action="">
           <div class="form-group">
               <label for="name">Your Name:</label> 
               <input type="text" name="name" id="name" class="form-control">
           </div>
           <div class="form-group">
               <label for="email">Your E-mail:</label> 
               <input type="text" name="email" id="email" class="form-control">
           </div>
           <div class="form-group">
               <label for="message">Your Message:</label> 
               <textarea rows=6 name="message" id="message" class="form-control"></textarea>
           </div>
           <div class="form-group">
               <input type="submit" name="submit" id="submit" class="btn btn-primary pull-right">
               <input type="hidden" value="{{ Session::token() }}" name="_token">
           </div>
        </form>    
    </div>
@endsection


@section('footer')
    Copyright
@endsection
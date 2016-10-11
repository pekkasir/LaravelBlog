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
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
           <h3>Login Form</h3>
            <form action="{{ route('login.admin') }}" method="post">
               <div class="form-group">
                   <label for="username">Username:</label>
                   <span style="color:#b94a48">
                    {{ $errors->has('username') ? $errors->first('username') : ""}}    
                    </span>  
                   <input type="text" name="username" id="username" class="form-control">
               </div>
               <div class="form-group">
                   <label for="password">Password:</label>
                   <span style="color:#b94a48">
                    {{ $errors->has('password') ? $errors->first('password') : ""}}    
                    </span>  
                   <input type="password" name="password" id="password" class="form-control">
               </div>
               <div class="form-group">
                   <input type="submit" name="submit" id="submit" class="btn btn-primary pull-right" value="Login">
                   <input type="hidden" value="{{ Session::token() }}" name="_token">
               </div>
            </form>         
       </div>    
   </div>
@endsection


@section('footer')
    <div class="text-center">&copy Peki</div>
@endsection
@extends('layouts.master')

@section('title','Login & Register')


@section('content')

<div class="container" id="login-register">
	<div class="row">
        @include('layouts.messages')
        
        <div class="col-md-6">
            <h2>Login</h2>
            <form action="{{route('login')}}" method="post">
                <input name="email" class="form-control" placeholder="Email" value="{{ Request::old('email') }}">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <button type="submit" class="btn btn-default">Login</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

        <div class="col-md-6">
            <h2>Register</h2>
            <form action="{{route('register')}}" method="post">
                <input name="email" class="form-control" placeholder="Email" value="{{ Request::old('email') }}">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <button type="submit" class="btn btn-default">Register</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

	</div>
</div>

@endsection
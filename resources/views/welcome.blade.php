@extends('layouts.master')
@section('title','welcome to todo list')

@section('content')
<div class="container" id="login-register">
    <div class="row">
        @include('layouts.messages')
        <div class="col-md-6 col-md-offset-3">
            <h3>Please login or Register to make your own todo list</h3>
        </div>
    </div>
</div>
@endsection
@extends('layouts.master')

@section('title','Todo page')


@section('content')

<div class="container" id="login-register">
	<div class="row">
        @include('layouts.messages')
        
        <div class="col-md-6">
            <table class="table table-striped">
              <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">item</th>
                  <th class="text-center">done</th>
              </tr>
                <?php $i = 0;?>
                @foreach($items as $item)
                  <?php $i++;?>
                  <tr class="text-center">
                      <td>{{$i}}</td>
                      <td>{{$item->item}}</td>
                      <td>
                        {{$item->done == 1 ? 'Yes' : 'No'}} 

                        @if($item->done == 0)
                        <form method="POST" action="{{route('edit',$item->id)}}"> 
                          {{ method_field('PUT') }} 
                          <button type="submit" class="btn btn-success">Done</button> 
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                        @endif

                        <form method="POST" action="{{route('delete',$item->id)}}"> 
                          {{ method_field('DELETE') }} 
                          <button type="submit" class="btn btn-danger">Delete</button> 
                         <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>

                      </td>
                  </tr>
                @endforeach
            </table>
            <br>
            <form action="{{route('items')}}" method="post">
                <input name="item" class="form-control" placeholder="add your todo list">
                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

	</div>
</div>

@endsection
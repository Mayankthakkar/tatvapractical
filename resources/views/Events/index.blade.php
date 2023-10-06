@extends('Events.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Event List Page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('event.create') }}"> Create </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            
            <th>Title</th>
            <th>Dates</th>
            <th>Occurernce</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($events as $product)
        <tr>
           
            <td>{{ $product->title }}</td>
            <td>{{ $product->dates }}</td>
            <td>{{ $product->recurrence }}</td>
            <td>
                <form action="{{ route('event.delete',$product->encryptedId) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('event.view',$product->encryptedId) }}">View</a>
    
                    <a class="btn btn-primary" href="{{ route('event.edit',$product->encryptedId) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection
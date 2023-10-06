@extends('Events.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> View Event</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('event') }}"> Back</a>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $data->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dates:</strong>
                
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Dates</th>
                </tr>
                @foreach ($data->dates as $date)
                <tr>
                    <td>{{ $date }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
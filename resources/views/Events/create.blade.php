@extends('Events.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Event</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('event') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('event.store') }}" id="quickForm" novalidate="novalidate" method="POST">
    @csrf
  
     <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group">
                <strong>Name<small style="color:red;">*</small></strong>
                <input type="text" name="title" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Start Date<small style="color:red;">*</small></label>
                <input type="text" placeholder="Start Date" name="fromdate" id="fromdate">
                <!-- <div class="input-group date" id="fromdate">
                    <input type="text" name="fromdate" class="form-control fromdate" id="fromdate" >
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>End Date<small style="color:red;">*</small></label>
                <input type="text" placeholder="End Date" name="todate" id="todate">
                
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputType4">Recurrence<small style="color:red;">*</small></label>
                <select class="form-control" name="type" id="type">
                    <!-- <option value="">Select</option> -->
                    <option value="1">Every</option>
                    <option value="2">Every Other</option>
                    <option value="3">Every Third</option>
                    <option value="4">Every Forth</option>
                </select>
                <br>
                <select class="form-control" name="time" id="time">
                    <!-- <option value="">Select</option> -->
                    <option value="1">Day</option>
                    <option value="7">Week</option>
                    <option value="31">Month</option>
                    <option value="366">Year</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
<script type="text/javascript">
    $(function () {
        $('#todate').datepicker({
            dateFormat: 'dd-mm-yy',
            autoclose: true
        });

        $('#fromdate').datepicker({
            dateFormat: 'dd-mm-yy',
            autoclose: true
        });
        
        $('#quickForm').validate({
            rules: {
                title: {
                    required: true
                },
                fromdate: {
                    required: true
                },
                todate: {
                    required: true
                },
                type: {
                    required: true
                },
                time: {
                    required: true
                },
            
            },
            messages: {
                title: {
                    required: "Please enter title",
                },
                type: {
                    required: "Please select type",
                },
                time: {
                    required: "Please select time",
                },
                fromdate: {
                    required: "Please select date",
                },
                todate: {
                    required: "Please select date",
                },
                
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            }
        });
    });

</script>
@endsection
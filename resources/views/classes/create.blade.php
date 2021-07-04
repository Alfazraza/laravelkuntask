@extends('classes.layout')
  
@section('content')
<div class="row padding-bt">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Class</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('classes.index') }}"> Back</a>
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
   
<form action="{{ route('classes.store') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input class="form-control" name="name" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Maximum Students:</strong>
                <input class="form-control" type="number" name="maximum_students" placeholder="Maximum Students">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                    <select class="form-control" name="status">
                        <option value="">Please select any option</option>
                        <option value="opened">Opened</option>
                        <option value="closed">Closed</option>
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input class="form-control" name="description" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
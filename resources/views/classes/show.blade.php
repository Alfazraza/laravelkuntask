@extends('classes.layout')
  
@section('content')
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Class Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classes.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                {{ $class->code }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $class->name }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Maximum Students:</strong>
                {{ $class->maximum_students }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $class->status }}
            </div>
        </div>
    </div>

        <div class="pull-left">
                <h2> </h2>
            </div>

       <table class="table table-bordered">
        <tr>
            <th>SI No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th width="280px">Action</th>
        </tr>
        @php
        $i = 0
        @endphp
       @if(count($students))
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
   
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
             {{ method_field('DELETE') }}
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
         @endforeach
        @else
            <tr>
                <td class="center" colspan="7">No records found</td>
            </tr>
        @endif

    </table>
@endsection
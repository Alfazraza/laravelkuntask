@extends('students.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Kun Academy (Student Module) </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Add New Student</a>
            </div>
             <div class="pull-right goto_home">
                <a class="btn btn-success" href="/"> Goto Home</a>
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
            <th>SI No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Class Code</th>
            <th>Date of Birth</th>
            <th width="280px">Action</th>
        </tr>
       @if(count($students))
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->code }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
    
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
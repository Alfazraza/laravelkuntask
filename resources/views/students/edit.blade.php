@extends('students.layout')
   
@section('content')
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
            </div>
            <div class="pull-right m-right">
                <a class="btn btn-primary" href="{{ route('classes.index') }}"> Goto Classes</a>
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
    <form action="/students/{{$student->id}}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{method_field('PUT')}}

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="{{ $student->first_name }}" class="form-control" placeholder="First Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                     <input type="text" name="last_name" value="{{ $student->last_name }}" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                
                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">                
                            <strong>Class:</strong>
                               <select class="form-control" name="kunacademy_id">
                                <option value="">Please select any class</option>

                    @if(count($classes))
                        @foreach($classes as $class)
                            @if($class->id == $student->kunacademy_id)
                            <option value="{{ $class->id }}" selected>
                                {{ $class->code }}
                            </option>
                            @else
                            <option value="{{ $class->id }}">
                                {{ $class->code }}
                            </option>

                             @endif
                        @endforeach
                    @else
                      <option>No class record found</option>
                    @endif
                    </select>
                        </div>
                        </div>
            </div>
        
           
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Date of Birth:</strong>
                <input class="form-control" type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" placeholder="Date of Birth">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
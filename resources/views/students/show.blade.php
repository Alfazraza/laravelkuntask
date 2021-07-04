@extends('students.layout')
  
@section('content')
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Student Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
   <div class="row m_t">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $student->first_name }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $student->last_name }}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
                
                        <div class="form-group">                
                            <strong>Class:</strong>

                    @if(count($classes))
                        @foreach($classes as $class)
                            @if($class->id == $student->kunacademy_id)
                                {{ $class->code }}
                             @endif
                        @endforeach
                   @endif
                        </div>
            </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                {{ $student->date_of_birth }}
            </div>
        </div>
    </div>
@endsection
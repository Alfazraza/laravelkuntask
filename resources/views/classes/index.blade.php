@extends('classes.layout')
 
@section('content')
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Kun Academy (Class Module) </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('classes.create') }}"> Add New class</a>
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
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Maximum Students</th>
            <th>Status</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
       @if(count($classes))
        @foreach ($classes as $class)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $class->code }}</td>
            <td>{{ $class->name }}</td>
            <td>{{ $class->maximum_students }}</td>
            <td>{{ $class->status }}</td>
            <td>{{ $class->description }}</td>
            <td>
                <form action="{{ route('classes.destroy',$class->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('classes.show',$class->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('classes.edit',$class->id) }}">Edit</a>
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
  
    {!! $classes->links() !!}
      
@endsection
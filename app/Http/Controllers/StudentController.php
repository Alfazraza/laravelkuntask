<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kunacademy;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = Student::latest()->paginate(20);
        $students = Student::join('kunacademies', 'students.kunacademy_id', '=', 'kunacademies.id')
               ->get(['students.*', 'kunacademies.code']);
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Kunacademy::all();
        return view('students.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'kunacademy_id' => 'required',
            'date_of_birth' => 'required'
        ]);
        $students = Kunacademy::with('students')->find($request->kunacademy_id)->students;
        $maximum_students = Kunacademy::find($request->kunacademy_id)->maximum_students;
        
        if(count($students)>=$maximum_students){
                return Redirect::back()->withErrors(['error'=>'Exceeded the maximum strength of selected class']);
        }else{

        Student::create($request->all());
        
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
        }                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $classes = Kunacademy::all();
        return view('students.show',compact('student','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $class
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classes = Kunacademy::all();
        return view('students.edit',compact('student','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'kunacademy_id' => 'required',
            'date_of_birth' => 'required'
        ]);


        $student->update($request->all());
    
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}

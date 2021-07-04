<?php

namespace App\Http\Controllers;

use App\Models\Kunacademy;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Kunacademy::latest()->paginate(20);
    
        return view('classes.index',compact('classes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
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
            'code' => 'required',
            'name' => 'required',
            'maximum_students' => 'required|numeric|min:1|max:10',
            'status' => 'required'
        ]);
    
        Kunacademy::create($request->all());
     
        return redirect()->route('classes.index')
                        ->with('success','class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kunacademy  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Kunacademy $class)
    {
        $students = Kunacademy::with('students')->find($class->id)->students;
        return view('classes.show',compact('class','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kunacademy  $class
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunacademy $class)
    {
        return view('classes.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kunacademy  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunacademy $class)
    {
        $this->validate($request,[
            'code' => 'required',
            'name' => 'required',
            'maximum_students' => 'required|numeric|min:1|max:10',
            'status' => 'required'
        ]);
        $class->update($request->all());
        return redirect()->route('classes.index')
                        ->with('success','class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kunacademy  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunacademy $class)
    {
        $class->delete();
    
        return redirect()->route('classes.index')
                        ->with('success','Class deleted successfully');
    }
}

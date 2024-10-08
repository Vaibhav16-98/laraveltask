<?php

namespace App\Http\Controllers\Web\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tearcher;
use App\Models\Student as Students;


class Student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::with('teacher')->get();
        return view('student.list' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tearcher = Tearcher::all();
        return view('student.add' , compact('tearcher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required',
            'class_teacher_id' => 'required'    
        ]);

        Students::create($request->all());
        return redirect()->route('student.index')->with('success', 'Student created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        $tearcher = Tearcher::all();
        return view('student.edit' , compact('student' , 'tearcher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required',
            'class_teacher_id' => 'required'    
        ]);
        $student = Students::find($id);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Teacher created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Students::find($id);
        if ($student) {
            $student->delete(); 
        }

        return redirect()->route('student.index')->with('success', 'Student record deleted successfully.');
    }
}

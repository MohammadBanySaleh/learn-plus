<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::get();
        return view('admin_dashboard.students.index', compact('students'));
    }

    
    public function create()
    {
        $grades = Grade::get();

        return view('admin_dashboard.students.create', compact('grades'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grade_id' => 'required',
            'email' => 'required|unique:teachers',
            'password' => 'required|min:8'
        ]);

        Student::create([
            'name' => $request->input('name'),
            'grade_id' => $request->input('grade_id'),
            'email' => $request->input('email'),
            // 'password' => $request->input('password')
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    
    public function show(Student $student)
    {
        //
    }

   
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $grades = Grade::get();
        return view('admin_dashboard.students.edit', compact('student', 'grades'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'grade_id' => 'required',
            'email' => 'required|unique:students',
            'password' => 'required|min:8'
        ]);

        $data = $request->except(['_token', '_method']);
        $data['password'] = Hash::make($request->input('password'));

        Student::where('id', $id)->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

   
    public function destroy($id)
    {
        Student::destroy($id);
        return back()->with('success', 'Student deleted successfully.');
    }
}

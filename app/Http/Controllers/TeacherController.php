<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    
    public function index()
    {
        $teachers = Teacher::get();
        return view('admin_dashboard.teachers.index', compact('teachers'));

    }

    
    public function create()
    {
        return view('admin_dashboard.teachers.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers',
            'password' => 'required|min:8'
        ]);

        Teacher::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'password' => $request->input('password')
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

   
    public function show(Teacher $teacher)
    {
        //
    }

    
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin_dashboard.teachers.edit', compact('teacher'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $data = $request->except(['_token', '_method']);
        $data['password'] = Hash::make($request->input('password'));

        Teacher::where('id', $id)->update($data);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

   
    public function destroy($id)
    {
        Teacher::destroy($id);
        return back()->with('success', 'Teacher deleted successfully.');
    }
}

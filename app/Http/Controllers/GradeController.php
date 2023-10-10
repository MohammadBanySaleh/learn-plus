<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GradeController extends Controller
{
    
    public function index()
    {
        $grades = Grade::get();
        return view('admin_dashboard.grades.index', compact('grades'));
    }

    
    public function create()
    {
        return view('admin_dashboard.grades.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Grade::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade created successfully.');

    }

    
    public function show(Grade $grade)
    {
        //
    }

   
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('admin_dashboard.grades.edit', compact('grade'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);

        Grade::where('id', $id)->update($data);
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    
    public function destroy($id)
    {
        Grade::destroy($id);
        return back()->with('success', 'Grade deleted successfully.');

    }
}

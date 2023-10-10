<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubjectController extends Controller
{
   
    public function index()
    {
        $subjects = Subject::get();
        return view('admin_dashboard.subjects.index', compact('subjects'));
    }

   
    public function create()
    {
        $grades = Grade::get();
        $teachers = Teacher::get();

        return view('admin_dashboard.subjects.create', compact('grades', 'teachers'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grade_id' => 'required',
            'teacher_id' => 'required',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        //image handling

        $relativeImagePath = null;
        $newImageName = uniqid() . '-' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);



        Subject::create([
            'name' => $request->input('name'),
            'grade_id' => $request->input('grade_id'),
            'teacher_id' => $request->input('teacher_id'),
            'image' => $relativeImagePath
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');

    }

  
    public function show(Subject $subject)
    {
        //
    }

    
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('admin_dashboard.subjects.edit', compact('subject', 'grades', 'teachers'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'grade_id' => 'required',
            'teacher_id' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Subject::where('id', $id)->update($data);
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

   
    public function destroy($id)
    {
        Subject::destroy($id);
        return back()->with('success', 'Subject deleted successfully.');
    }

    public function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);


        return $relativeImagePath;

    }
}

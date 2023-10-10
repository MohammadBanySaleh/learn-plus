<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Assignment_Solution;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AssignmentController extends Controller
{
    
    public function index()
    {
        //
    }

    public function index2($id)
    {
        $subject_id = $id;
        $assignments = Assignment::where('subject_id', $id)->get();
        return view('teacher_dashboard.assignments.index', compact('assignments', 'subject_id'));

    }

    
    public function create()
    {
        //
    }
    public function create2($id)
    {
        $subject_id = $id;
        return view('teacher_dashboard.assignments.create', compact('subject_id'));
    }

   
    public function store(Request $request)
    {
        //
    }

    public function store2(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx',
            'deadline' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $relativeImagePath = null;
            $newImageName = uniqid() . '.' . $request->file('image')->extension();
            $relativeImagePath = 'assets/images/' . $newImageName;
            $request->file('image')->move(public_path('assets/images'), $newImageName);
            $data['image'] = $relativeImagePath;
        }

        if ($request->file('file')) {
            $relativeFilePath = null;
            $newFileName = uniqid() . '.' . $request->file('file')->extension();
            $relativeFilePath = 'assets/files/' . $newFileName;
            $request->file('file')->move(public_path('assets/files'), $newFileName);

            $data['file'] = $relativeFilePath;
        }

        Assignment::create($data);
        return redirect()->route('assignments.indexBySubject', $request->input('subject_id'))->with('success', 'Assignment created successfully.');
    }

    
    public function show(Assignment $assignment)
    {
        //
    }

   
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('teacher_dashboard.assignments.edit', compact('assignment'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx',
            'deadline' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $relativeImagePath = null;
            $newImageName = uniqid() . '.' . $request->file('image')->extension();
            $relativeImagePath = 'assets/images/' . $newImageName;
            $request->file('image')->move(public_path('assets/images'), $newImageName);
            $data['image'] = $relativeImagePath;
        }

        if ($request->file('file')) {
            $relativeFilePath = null;
            $newFileName = uniqid() . '.' . $request->file('file')->extension();
            $relativeFilePath = 'assets/files/' . $newFileName;
            $request->file('file')->move(public_path('assets/files'), $newFileName);

            $data['file'] = $relativeFilePath;
        }

        Assignment::where('id', $id)->update($data);
        return redirect()->route('assignments.indexBySubject', $request->input('subject_id'))->with('success', 'Assignment updated successfully.');
    }

    
    public function destroy($id)
    {
        Assignment::destroy($id);
        return back()->with('success', 'Assignment deleted successfully.');
    }

    public function solutions($assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);
        $subject_id = $assignment->subject->id;
        $subject = Subject::findOrFail($subject_id);
        // dd($subject_id);
        $solutions = Assignment_Solution::where('assignment_id', $assignment_id)->get();
        return view('teacher_dashboard.assignments.solutions', compact('solutions', 'subject', 'assignment'));

    }

    public function updateSolutionMark(Request $request)
    {
        $request->validate([
            'newMark' => 'numeric|required|min:0'
        ]);
        // dd($request->solutionId);
        $solution_id = $request->solutionId;
        $solution = Assignment_Solution::find($solution_id);
        $solution->update([
            'mark' => $request->input('newMark')
        ]);
        return back()->with('success', 'Mark updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContentController extends Controller
{

    public function index()
    {
        //

    }

    public function index2($id)
    {
        $subject_id = $id;
        $contents = Content::where('subject_id', $id)->get();
        return view('teacher_dashboard.contents.index', compact('contents', 'subject_id'));

    }


    public function create()
    {
        //
    }

    public function create2($id)
    {
        $subject_id = $id;
        return view('teacher_dashboard.contents.create', compact('subject_id'));

    }


    public function store(Request $request)
    {
        //
    }

    public function store2(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx'
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $relativeImagePath = null;
            $newImageName = uniqid() . '-' . $request->file('image')->extension();
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

        Content::create($data);
        return redirect()->route('contents.indexBySubject', $request->input('subject_id'))->with('success', 'Subject created successfully.');

    }


    public function show(Content $content)
    {
        //
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('teacher_dashboard.contents.edit', compact('content'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx'
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

        Content::where('id', $id)->update($data);
        return redirect()->route('contents.indexBySubject', $request->input('subject_id'))->with('success', 'Content updated successfully.');

    }


    public function destroy($id)
    {
        Content::destroy($id);
        return back()->with('success', 'Content deleted successfully.');
    }
}
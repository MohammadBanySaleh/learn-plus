<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class TeacherAuth extends Controller
{
    public function login()
    {
        return view('teacher_dashboard.teacher_login');
    }

    public function loginTeacher(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);

        $teacher = Teacher::where('email', $request->email)->first();

        if ($teacher) {
            if ($request->password == $teacher->password) {
                $request->session()->put('teacher_id', $teacher->id);
                session()->put('teacher_name', $teacher->name);

                return redirect('teacher_dashboard/home');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }

    }

    public function teacherLogout()
    {
        if (Session::has('teacher_id')) {
            Session::pull('teacher_id');
        }
        return view('teacher_dashboard.teacher_login');
    }

    public function teacherHome()
    {
        $teacher_id = session('teacher_id');
        $subjects = Subject::where('teacher_id', $teacher_id)->get();
        $studentCount = Student::count();
        $teacherCount = Teacher::count();
        $gradeCount = Grade::count();
        $subjectCount = Subject::count();
        // dd($subjects);

        return view('teacher_home', [
            'studentCount' => $studentCount,
            'teacherCount' => $teacherCount,
            'gradeCount' => $gradeCount,
            'subjectCount' => $subjectCount,
            'subjects' => $subjects
        ]);
    }

}
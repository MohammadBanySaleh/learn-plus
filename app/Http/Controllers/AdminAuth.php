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


class AdminAuth extends Controller
{
    public function login()
    {
        return view('admin_dashboard.admin_login');
    }

    public function loginAdmin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin) {
            if ($request->password == $admin->password) {
                $request->session()->put('admin_id', $admin->id);
                session()->put('admin_name', $admin->name);
                return redirect('admin_dashboard/home');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }

    }

    public function adminLogout()
    {
        if (Session::has('admin_id')) {
            Session::pull('admin_id');
            Session::pull('admin_name');
        }
        return redirect('admin_login'); // Redirect to the login page after logout.
    }

    public function adminHome()
    {
        $studentCount = Student::count();
        $teacherCount = Teacher::count();
        $gradeCount = Grade::count();
        $subjectCount = Subject::count();
        // dd($categoryCount);

        return view('admin_home', [
            'studentCount' => $studentCount,
            'teacherCount' => $teacherCount,
            'gradeCount' => $gradeCount,
            'subjectCount' => $subjectCount
        ]);
    }

}
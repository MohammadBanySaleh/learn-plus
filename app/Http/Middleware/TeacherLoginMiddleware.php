<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('teacher_id')) {
            // $message = $customMessageerror ?: 'Unauthorized access, please log in';
            return redirect('teacher_login')->with('fail', 'You must be logged in as teacher to access this page !');
        }
        
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbaordController extends Controller
{
    public  function index()
    {

        if (Auth::user()->user_type == 1) {
            $response['header'] = 'Admin';
            return view('admin.index', $response);
        } elseif (Auth::user()->user_type == 2) {
            $response['header'] = 'Teachers';

            return view('teacher.index', $response);
        } elseif (Auth::user()->user_type == 3) {
            $response['header'] = 'Students';

            return view('student.index', $response);
        } elseif (Auth::user()->user_type == 4) {
            $response['header'] = 'Parents';

            return view('parent.index', $response);
        }
    }
}

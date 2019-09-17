<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;

class StudentSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student = Student::select();

        if ($request->has('email')) {
            $email = mb_strtolower($request->get('email'));
            $email = addslashes($email);
            $student->whereRaw('email LIKE \'%' . $email . '%\'');
        }

        if ($request->has('name')) {
            $name = mb_strtolower($request->get('name'));
            $name = addslashes($name);
            $student->whereRaw('name LIKE \'%' . $name . '%\'');
        }

        return new StudentResource($student->get());
    }
}

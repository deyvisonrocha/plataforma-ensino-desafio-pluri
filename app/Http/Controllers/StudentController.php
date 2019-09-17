<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Resources\StudentResource;
use App\Http\Requests\Students\StudentStoreRequest;
use App\Http\Requests\Students\StudentUpdateRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();

        return new StudentResource($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StudentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $student = Student::create($request->all());

        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StudentUpdateRequest  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->all());

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->enrollments()->count()) {
            $student->enrollments()->delete();
        }

        $student->delete();

        return response()->json()->setStatusCode(200);
    }
}

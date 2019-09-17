<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Http\Resources\EnrollmentResource;
use App\Http\Requests\Enrollments\EnrollmentStoreRequest;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'course'])->get();

        return new EnrollmentResource($enrollments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EnrollmentStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnrollmentStoreRequest $request)
    {
        $enrollment = Enrollment::create($request->all());

        return new EnrollmentResource($enrollment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        return new EnrollmentResource($enrollment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EnrollmentStoreRequest  $request
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(EnrollmentStoreRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->all());

        return new EnrollmentResource($enrollment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return response()->json()->setStatusCode(200);
    }
}

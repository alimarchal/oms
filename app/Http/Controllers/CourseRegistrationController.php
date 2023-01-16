<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRegistrationRequest;
use App\Http\Requests\UpdateCourseRegistrationRequest;
use App\Models\Course;
use App\Models\CourseRegistration;
use http\Client\Request;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCourseRegistrationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRegistrationRequest $request)
    {
        $request->merge(['user_id' => auth()->id()]);

        $check = CourseRegistration::where('user_id', $request->user_id)->where('course_id', $request->course_id)->get();
        if ($check->isEmpty()) {
            $course_registration = CourseRegistration::create($request->all());
            session()->flash('message', 'You have been registered in this course.');
            return to_route('course.index');
        } else {
            session()->flash('message', 'You are already register in this course.');
            return to_route('course.index');
        }


    }


    public function viewRegisterCourses()
    {
        $courses = auth()->user()->courses;
//        dd($courses);
        return view('course.register_courses',compact('courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCourseRegistrationRequest $request
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRegistrationRequest $request, CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseRegistration $courseRegistration)
    {
        //
    }
}

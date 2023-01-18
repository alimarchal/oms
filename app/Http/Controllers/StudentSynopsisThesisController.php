<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentSynopsisThesisRequest;
use App\Http\Requests\UpdateStudentSynopsisThesisRequest;
use App\Models\CourseRegistration;
use App\Models\StudentSynopsisThesis;
use http\Client\Request;

class StudentSynopsisThesisController extends Controller
{

    public function thesisSynopsisStatus(\Illuminate\Http\Request $request,$id)
    {
        $thesis = StudentSynopsisThesis::find($id);
        return view('thesis.comments',compact('thesis'));
    }

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
     * @param \App\Http\Requests\StoreStudentSynopsisThesisRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate(
            [
                'synopsis_file_1' => ['required', 'mimes:pdf'],
                'area_of_specialization' => ['required'],
                'thesis_title' => ['required'],
                'agree' => ['required'],
            ],
            [
                'agree.required' => 'You must agree the terms and conditions.',
                'synopsis_file_1.required' => 'The synopsis file field is required.',
            ]
        );

        $status = 0;
        if ($request->hasFile('synopsis_file_1')) {
            $path = $request->file('synopsis_file_1')->store('', 'public');
            $request->merge(['synopsis_file' => $path]);
            $status++;
        }

        if ($request->hasFile('thesis_document_1')) {
            $path = $request->file('thesis_document_1')->store('', 'public');
            $request->merge(['thesis_document' => $path]);
            $status++;
        }

        $request->merge(['user_id' => auth()->user()->id]);
        $request->merge(['submission_status' => $status]);

        /*
         * 1 = synopsis
         * 2 = thesis
         * 3 = 3
         */
        $course_registration = StudentSynopsisThesis::create($request->all());
        session()->flash('message', 'You synopsis/thesis has been uploaded successfully.');
        return to_route('studentSynopsisThesis.show', $course_registration->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\StudentSynopsisThesis $studentSynopsisThesis
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSynopsisThesis $studentSynopsisThesis)
    {
        $user = auth()->user();
        $user_status = 0;
        $user_thesis = StudentSynopsisThesis::where('user_id', $user->id)->first();
        if (!empty($user_thesis)) {
            $user_status = $user_thesis->submission_status;
        }


        return view('thesis.index', compact('user', 'user_status', 'user_thesis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StudentSynopsisThesis $studentSynopsisThesis
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentSynopsisThesis $studentSynopsisThesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStudentSynopsisThesisRequest $request
     * @param \App\Models\StudentSynopsisThesis $studentSynopsisThesis
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, $id)
    {
        $studentSynopsisThesis = StudentSynopsisThesis::find($id);

        $request->validate(
            [
                'thesis_document_1' => ['required', 'mimes:pdf'],
                'agree' => ['required'],
            ],
            [
                'agree.required' => 'You must agree the terms and conditions.',
                'thesis_document_1.required' => 'The thesis document file field is required.',
            ]
        );
        $status = 1;
        if ($request->hasFile('thesis_document_1')) {
            $path = $request->file('thesis_document_1')->store('', 'public');
            $request->merge(['thesis_document' => $path]);
            $status++;
        }

        /*
         * 1 = synopsis
         * 2 = thesis
         */
        $studentSynopsisThesis->update([
            'thesis_document' => $request->thesis_document,
            'submission_status' => $status,
        ]);
        $studentSynopsisThesis->save();
        session()->flash('message', 'You synopsis/thesis has been updated successfully.');
        return to_route('studentSynopsisThesis.show', $studentSynopsisThesis->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StudentSynopsisThesis $studentSynopsisThesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentSynopsisThesis $studentSynopsisThesis)
    {
        //
    }
}

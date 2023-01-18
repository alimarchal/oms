<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;
use App\Models\StudentSynopsisThesis;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{

    public function viewRegisterStudentDetail(Request $request)
    {
//        $register_students = User::where('supervisor_id',3)->get();
        $register_students = User::where('supervisor_id', auth()->user()->id)->get();
        return view('superVisor.viewRegisterStudentDetail', compact('register_students'));
    }

    public function viewThesisSynopsis(Request $request)
    {
        $register_students = User::where('type', 'Student')->get();
        return view('Evaluator.viewRegisterStudentDetail', compact('register_students'));
    }

    public function manageSchedule(Request $request)
    {
        $register_students = User::where('type', 'Student')->get();
        return view('Evaluator.manageSchedule', compact('register_students'));
    }

    public function manageScheduleUpdate(Request $request)
    {
        $student_thesis = StudentSynopsisThesis::find($request->id);
        $student_thesis->update($request->all());
        session()->flash('message', 'You have set schedule successfully.');
        return to_route('manageSchedule');
    }


    public function generateEvaluationReport(Request $request)
    {
        $register_students = User::where('type', 'Student')->get();
        return view('generateEvaluationReport.generateEvaluationReport', compact('register_students'));
    }

    public function generateEvaluationReportThesisId(Request $request, StudentSynopsisThesis $thesisId)
    {
        $student_thesis = $thesisId;
        return view('generateEvaluationReport.generateEvaluationReportThesisId', compact('student_thesis'));
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
     * @param \App\Http\Requests\StoreSupervisorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupervisorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Supervisor $supervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSupervisorRequest $request
     * @param \App\Models\Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupervisorRequest $request, Supervisor $supervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supervisor $supervisor)
    {
        //
    }
}

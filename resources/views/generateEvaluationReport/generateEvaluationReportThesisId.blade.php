@extends('dashboard_layout')
@section('top_title')
    Registered Students With Me
@endsection
@section('page_main_name')
    My Students
@endsection
@section('page_name')
    Registered Students With Me
@endsection
@section('body')
    @csrf
    <br>

    <div class="row bg-white m-2 p-2">
        <div class="col-2">
            <img src="{{\Illuminate\Support\Facades\Storage::url('CUI_Logo_low.png')}}" class="ml-4" alt="Logo" width="100">
        </div>

        <div class="col-10  ">
            <h1 class="text-bold text-center mt-3">Synopsis Evaluation Report</h1>
        </div>


        <div class="col-12">
            <hr>
        </div>


        <div class="col-12">
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <td>Candidate: {{$student_thesis->user->name}}</td>
                    <td>Registration No: {{$student_thesis->user->registration_no}}</td>
                </tr>
                <tr>
                    <td>Supervisor: {{$student_thesis->user->supervisor->name}}</td>
                    <td>Date: {{\Carbon\Carbon::parse($student_thesis->created_at)->format('d-m-Y')}}</td>
                </tr>

                <tr>
                    <td colspan="2">
                        Synopsis Title: {{$student_thesis->thesis_title}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        After in depth examination of the manuscript following are the recommendations of GAC member(s)
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-bordered">
                <thead>

                <tr>
                    <th>Name</th>
                    <th>Recommendation</th>
                    <th>Is Required Again?</th>
                </tr>
                </thead>
                <tbody>

                @foreach($student_thesis->comments as $cmt)
                    <tr>
                        <td>{{\App\Models\User::find($cmt->supervisor_id)->name}}</td>
                        <td>{{$cmt->recommendation}}</td>
                        <td>
                            @if($cmt->required_again == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        @if(auth()->user()->roles->pluck("name")->first() == "Evaluator")
        <div class="col-12">
            <h3>Send report to In-charge </h3>


                <form action="{{route('sendToIncharge')}}" method="post">
                    @csrf
                    <input type="hidden" name="student_synopsis_thesis_id" value="{{$student_thesis->id}}">
                    <select class="form-select" name="user_id" required>
                        <option value="">None</option>
                        @foreach(\App\Models\User::where('type','In-charge')->get() as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="send">
                </form>

        </div>
        @endif

    </div>
@endsection

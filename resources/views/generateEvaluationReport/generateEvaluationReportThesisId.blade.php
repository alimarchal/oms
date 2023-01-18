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

    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
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
                        <td>{{$cmt->supervisor->name}}</td>
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


    </div>
@endsection

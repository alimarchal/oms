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


        @if($reports->isNotEmpty())
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Registration No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Program</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Synopsis</th>
                    <th scope="col">Thesis</th>
                    <th scope="col">View Report</th>

                </tr>
                </thead>
                <tbody>
                @foreach($reports as $rs)

                    <tr>
                        <td scope="row"><strong>{{$loop->iteration}}</strong></td>
                        <td>{{$rs->student_thesis->user->registration_no}}</td>
                        <td>

                            {{$rs->student_thesis->user->name}}

                        </td>

                        <td>{{$rs->student_thesis->user->program}}</td>
                        <td>{{$rs->student_thesis->user->mobile}}</td>
                        <td>


                            @if(!empty($rs->student_thesis->synopsis_file))
                                <strong>
                                    <span>
                                        <a class="text-danger" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($rs->student_thesis->synopsis_file)}}">{{$rs->student_thesis->user->course_work_completion}}-{{$rs->student_thesis->user->program}}_Synopsis.pdf</a>
                                    </span>
                                </strong>
                            @else
                                Not Available
                            @endif

                        </td>
                        <td>
                            @if(!empty($rs->student_thesis->thesis_document))
                                <strong>
                                    <span>
                                        <a class="text-danger" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($rs->student_thesis->thesis_document)}}">{{$rs->student_thesis->user->course_work_completion}}-{{$rs->student_thesis->user->program}}_Thesis.pdf</a>
                                    </span>
                                </strong>

                            @else
                                Not Available
                            @endif
                        </td>

                        <td>

                            @if(!empty($rs->student_thesis))
                                <a href="{{route('generateEvaluationReportThesisId',$rs->student_thesis->id)}}">View Report</a>
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

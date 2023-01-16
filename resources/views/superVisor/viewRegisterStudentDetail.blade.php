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


        @if($register_students->isNotEmpty())
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Registration No</th>
                    <th scope="col">Program</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Synopsis</th>
                    <th scope="col">Thesis</th>
                    <th scope="col">Work Completion</th>
                    <th scope="col">Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($register_students as $rs)

                    <tr>
                        <td scope="row"><strong>{{$loop->iteration}}</strong></td>
                        <td>
                            @if(!empty($rs->synopsisThesis))
                            <a href="{{route('thesisSynopsisStatus',$rs->synopsisThesis->id)}}">
                                    {{$rs->name}}
                            </a>
                            @else
                                <a href="#">
                                    {{$rs->name}}
                                </a>
                            @endif

                        </td>
                        <td>
                            {{ $rs->email }}
                        </td>
                        <td>{{$rs->id}}-{{$rs->course_work_completion}}-{{$rs->program}}</td>
                        <td>{{$rs->program}}</td>
                        <td>{{$rs->mobile}}</td>
                        <td>
                            <strong>
                                <span>
                                <a class="text-danger" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($rs->synopsisThesis->synopsis_file)}}">{{$rs->course_work_completion}}-{{$rs->program}}_Synopsis.pdf</a>
                            </span>
                            </strong>
                        </td>
                        <td>
                            <strong>
                                <span>
                                <a class="text-danger" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($rs->synopsisThesis->thesis_document)}}">{{$rs->course_work_completion}}-{{$rs->program}}_Thesis.pdf</a>
                            </span>
                            </strong>
                        </td>
                        <td>{{$rs->course_work_completion}}</td>
                        <td>
                            Pending
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@extends('dashboard_layout')
@section('top_title')
    Thesis / Synopsis Submission
@endsection
@section('page_main_name')
    Thesis / Synopsis Submission
@endsection
@section('page_name')
    Thesis / Synopsis Submission
@endsection

@section('body')
    <ul class="nav nav-tabs">
        <li class="nav-item">

            @if(!empty(auth()->user()->synopsisThesis))
                <a href="{{route('studentSynopsisThesis.show', auth()->user()->synopsisThesis->id)}}" class="nav-link @if(request()->routeIs('studentSynopsisThesis.*')) active @endif ">
                    Thesis / Synopsis Submission
                </a>
            @else
                <a href="{{route('studentSynopsisThesis.show', auth()->user()->id)}}" class="nav-link @if(request()->routeIs('studentSynopsisThesis.*')) active @endif ">
                    Thesis / Synopsis Submission
                </a>
            @endif

        </li>

        @if(!empty(auth()->user()->synopsisThesis))
            <li class="nav-item">
                <a href="{{route('thesisSynopsisStatus', auth()->user()->synopsisThesis->id)}}" class="nav-link @if(request()->routeIs('guarantee.*')) active @endif  ">Thesis Status / Comments</a>
            </li>
        @else
            <li class="nav-item">
                <a href="#" class="nav-link @if(request()->routeIs('guarantee.*')) active @endif  ">Thesis Status / Comments</a>
            </li>
        @endif



    </ul>


    @if(count($errors))
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br/>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($user_status == 0)
        <form method="post" class="row p-2 m-2 bg-white" action="{{route('studentSynopsisThesis.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <label for="program"><strong>Program</strong></label>
                    <input type="text" id="program" class="form-control" name="program" required value="{{$user->program}}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="area_of_specialization"><strong>Area of Specialization</strong></label>
                    <input type="text" class="form-control" id="area_of_specialization" required name="area_of_specialization">
                </div>
                <div class="col-md-4">
                    <label for="supervisor"><strong>Supervisor Name</strong></label>
                    <input type="text" class="form-control" id="supervisor" value="@if(!empty($user->supervisor)){{$user->supervisor->name}}@endif" readonly required name="supervisor">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="thesis_title"><strong>Thesis Title</strong></label>
                    <input type="text" class="form-control" id="thesis_title" name="thesis_title">
                </div>


                <div class="col-md-12 mb-2  mt-2">
                    <label for="synopsis_file"><strong>Synopsis File</strong></label>
                    <input name="synopsis_file_1" type="file" class="form-control" id="synopsis_file">
                </div>
                <div class="col-md-12 mb-2">
                    <label for="thesis_document"><strong>Thesis Document</strong></label>
                    <input name="thesis_document_1" type="file" class="form-control" id="synopsis_file">
                </div>

                {{--            <div class="col-md-12 mb-2">--}}
                {{--                <label for="synopsis_approval_notification"><strong>Synopsis Approval Notification</strong></label>--}}
                {{--                <input name="synopsis_approval_notification_1" type="file" class="form-control" id="synopsis_approval_notification">--}}
                {{--            </div>--}}
                <div class="col-md-3 mb-3">
                    <label for="session"><strong>Session</strong></label>
                    <input type="text" class="form-control" readonly value="{{$user->course_work_completion}}" id="session" name="session" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="defence_date"><strong>Defence Date</strong></label>
                    <input type="date" min="{{date('Y-m-d')}}" class="form-control" id="defence_date" readonly name="defence_date">
                </div>

                <div class="col-md-12 mb-4 ml-4 mt-1">
                    <input class="form-check-input" type="checkbox" name="agree" id="agree">
                    <label class="form-check-label" for="agree">
                        By clicking Submit, I hereby:
                        <ul>
                            <li>Agree and consent to supervise this student</li>
                            <li>The attached notification is valid and belongs to this student</li>
                            <li>The thesis document is according to the given template and digitally signed</li>
                            <li>The plagiarism report is also digitally signed</li>
                        </ul>
                    </label>
                </div>


            </div>
            <button class="btn btn-danger" type="submit">Submit</button>
        </form>
    @else
        <form method="post" class="row p-2 m-2 bg-white" action="{{route('studentSynopsisThesis.update',$user_thesis->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-4">
                    <label for="program"><strong>Program</strong></label>
                    <input type="text" id="program" class="form-control" name="program" required value="{{$user->program}}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="area_of_specialization"><strong>Area of Specialization</strong></label>
                    <input type="text" class="form-control" id="area_of_specialization" disabled value="{{$user_thesis->area_of_specialization}}" required name="area_of_specialization">
                </div>
                <div class="col-md-4">
                    <label for="supervisor"><strong>Supervisor Name</strong></label>
                    <input type="text" class="form-control" id="supervisor" value="@if(!empty($user->supervisor)){{$user->supervisor->name}}@endif" readonly required name="supervisor">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="thesis_title"><strong>Thesis Title</strong></label>
                    <input type="text" class="form-control" id="thesis_title" disabled value="{{$user_thesis->thesis_title}}" name="thesis_title">
                </div>


                <div class="col-md-12 mb-2  mt-2">
                    <label for="synopsis_file"><strong>Synopsis File :
                            <span>
                                <a class="text-danger" href="{{\Illuminate\Support\Facades\Storage::url($user_thesis->synopsis_file)}}">{{$user->course_work_completion}}-{{$user->program}}.pdf</a>
                            </span>
                        </strong></label>
                </div>
                <div class="col-md-12 mb-2">

                    @if($user_status == 2)
                        <label for="thesis_document_1">
                            <strong>
                                Thesis File:
                            <span>
                                <a class="text-danger" href="{{\Illuminate\Support\Facades\Storage::url($user_thesis->thesis_document)}}">{{$user->course_work_completion}}-{{$user->program}}.pdf</a>
                            </span>
                            </strong>
                        </label>

                    @else

                        <label for="thesis_document_1">
                            <strong>
                                Thesis File:
                            </strong>
                        </label>
                        <input name="thesis_document_1" type="file" class="form-control" id="thesis_document_1">
                    @endif


                </div>

                <div class="col-md-3 mb-3">
                    <label for="session"><strong>Session</strong></label>
                    <input type="text" class="form-control" readonly value="{{$user->course_work_completion}}" id="session" name="session" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="defence_date"><strong>Defence Date</strong></label>
                    <input type="date" min="{{date('Y-m-d')}}" class="form-control" id="defence_date" readonly name="defence_date">
                </div>

                <div class="col-md-12 mb-4 ml-4 mt-1">
                    <input class="form-check-input" type="checkbox" name="agree" id="agree" @if(@$user_status == 2) checked disabled @endif>
                    <label class="form-check-label" for="agree">
                        By clicking Submit, I hereby:
                        <ul>
                            <li>Agree and consent to supervise this student</li>
                            <li>The attached notification is valid and belongs to this student</li>
                            <li>The thesis document is according to the given template and digitally signed</li>
                            <li>The plagiarism report is also digitally signed</li>
                        </ul>
                    </label>
                </div>


            </div>

            @if($user_status == 2)

            @else
                <button class="btn btn-danger" type="submit">Update Final</button>
            @endif



        </form>
    @endif

@endsection


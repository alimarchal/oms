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

        @if(auth()->user()->roles->pluck("name")->first() == "Student")
            <li class="nav-item">
                <a href="{{route('studentSynopsisThesis.show',auth()->user()->id)}}" class="nav-link @if(request()->routeIs('studentSynopsisThesis.*')) active @endif ">
                    Thesis / Synopsis Submission
                </a>
            </li>
        @endif


        <li class="nav-item">
            <a href="{{route('thesisSynopsisStatus',$thesis->id)}}" class="nav-link @if(request()->routeIs('thesisSynopsisStatus')) active @endif  ">Thesis Status / Comments</a>
        </li>


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

    <div class="row row p-2 m-2 bg-white">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td class="text-bold">Name</td>
                <td>{{$thesis->user->name}}</td>
            </tr>
            <tr>
                <td class="text-bold">Email</td>
                <td>{{$thesis->user->email}}</td>
            </tr>
            <tr>
                <td class="text-bold">Program</td>
                <td>{{$thesis->user->program}}</td>
            </tr>
            <tr>
                <td class="text-bold">Thesis Title</td>
                <td>{{$thesis->thesis_title}}</td>
            </tr>
            <tr>
                <td class="text-bold">Area of Specialization</td>
                <td>{{$thesis->area_of_specialization}}</td>
            </tr>
            <tr>
                <td class="text-bold">Supervisor</td>
                <td>{{$thesis->user->supervisor->name}}</td>
            </tr>
            <tr>
                <td class="text-bold">Synopsis File</td>
                <td>
                    <span>
                        <a class="text-danger" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($thesis->synopsis_file)}}">
                            Synopsis_
                            {{$thesis->user->course_work_completion}}-{{$thesis->user->program}}.pdf
                        </a>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="text-bold">Thesis Document</td>
                <td>                    <span>
                        <a class="text-danger" target="_blank" href="{{\Illuminate\Support\Facades\Storage::url($thesis->synopsis_file)}}">
                            Thesis_{{$thesis->user->course_work_completion}}-{{$thesis->user->program}}.pdf
                        </a>
                    </span></td>
            </tr>

            </tbody>
        </table>


        <hr>
        <br>


        <h3>Thesis/Synopsis Progress</h3>

    </div>

    @if($thesis->comments->isNotEmpty())
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">

                        @foreach($thesis->comments as $cmnt)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <strong>Comment:</strong> {!! $cmnt->comments !!}<br>
                                    <strong>Recommendation:</strong> {!! $cmnt->recommendation !!}
                                    <br>
                                    <strong>Required Again:</strong>
                                    @if($cmnt->required_again == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                    <br>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <p class="small mb-0 ms-2">
                                                {{\App\Models\User::find($cmnt->supervisor_id)->name}} - {{$cmnt->created_at}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    @endif




    @if(auth()->user()->roles->pluck("name")->first() == "Evaluator")
        <form method="post" action="{{route('comment.store')}}" class="row p-2 m-2">
            @csrf


            <div class="col-md-12 mb-4">
                After in depth examination of the manuscript following are the recommendations of GAC member
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>The candidate is recommended to do minor changings.</td>
                        <td>A candidate has to re-submit manuscript (e.g. within 4 weeks for PhD student and 1 week for MS Student).</td>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="recommendation"
                                       value="Minor Changings" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>The candidate is recommended to do major changing.</td>
                        <td>Candidate has to appear in next semester.</td>
                        <td>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="recommendation" value="Major Changings">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>The candidate is not allowed to resubmit the same manuscript for reexamination</td>
                        <td>Candidate has to appear in next semester with different idea.</td>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="recommendation"
                                       value="Not Allowed">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 mb-4">
                Required Again
            </div>

            <div class="col-md-12 mb-4">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="required_again" value="1">Yes
                    <label class="form-check-label" for="radio1"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="required_again" value="0">No
                    <label class="form-check-label" for="radio1"></label>
                </div>
            </div>
            <input type="hidden" name="student_synopsis_thesis_id" value="{{$thesis->id}}">
            <div class="col-md-12 mb-4">
                <h2>Comments:</h2>
                <textarea id="mytextarea" name="comments"></textarea>
            </div>

            <div class="col-md-4 mb-2">
                <button class="btn btn-danger" type="submit">Submit</button>
            </div>
        </form>
    @endif

@endsection


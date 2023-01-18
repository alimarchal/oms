@extends('dashboard_layout')
@section('top_title')
    Registered Students With Me
@endsection
@section('page_main_name')
    Manage Schedule
@endsection
@section('page_name')
    Manage Schedule
@endsection
@section('body')
    @csrf
    <br>

    <div class="row bg-white m-2 p-2">


        @if($register_students->isNotEmpty())
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Registration No</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Work Completion</th>
                    <th scope="col">Set Schedule</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($register_students as $rs)

                    <tr>
                        <td scope="row"><strong>{{$loop->iteration}}</strong></td>


                        <td>
                            @if(!empty($rs->synopsisThesis))
                                    {{$rs->name}}
                            @else
                                    {{$rs->name}}
                            @endif

                        </td>

                        <td>
                            @if(!empty($rs->synopsisThesis))
                                <a href="{{route('thesisSynopsisStatus',$rs->synopsisThesis->id)}}">
                                    Give Remarks
                                </a>
                            @else

                            @endif
                        </td>
                        <td>{{$rs->id}}-{{$rs->course_work_completion}}-{{$rs->program}}</td>
                        <td>{{$rs->mobile}}</td>

                        <td>{{$rs->course_work_completion}}</td>
                        <td>


                            @if(!empty($rs->synopsisThesis))
                                <form method="post" action="{{route('manageSchedule')}}">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$rs->synopsisThesis->id}}">
                                    @if(is_null($rs->synopsisThesis->defence_date))
                                        <input type="date" min="{{date('Y-m-d')}}" id="defence_date" name="defence_date" required>
                                        <input type="time" id="defense_time" name="defense_time" required>
                                        <input type="submit" value="Update">
                                    @else
                                        {{$rs->synopsisThesis->defence_date}}  {{$rs->synopsisThesis->defense_time}}
                                    @endif

                                </form>

                                <a href="{{route('thesisSynopsisStatus',$rs->synopsisThesis->id)}}">
                                    {{$rs->defense_date}}
                                </a>
                            @else
                                <a href="#">
                                    {{$rs->defense_date}}
                                </a>
                            @endif

                        </td>
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

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
            <a href="{{route('studentSynopsisThesis.index')}}" class="nav-link @if(request()->routeIs('studentSynopsisThesis.*')) active @endif ">
                Thesis / Synopsis Submission
            </a>
        </li>

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
                <td>Name</td>
                <td>{{$thesis->user_id}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td></td>
            </tr>
            <tr>
                <td>Program</td>
                <td></td>
            </tr>
            <tr>
                <td>Thesis Title</td>
                <td></td>
            </tr>
            <tr>
                <td>Area of Specialization</td>
                <td></td>
            </tr>
            <tr>
                <td>Supervisor</td>
                <td></td>
            </tr>
            <tr>
                <td>Synopsis File</td>
                <td></td>
            </tr>
            <tr>
                <td>Thesis Document</td>
                <td></td>
            </tr>
            <tr>
                <td>Synopsis Approval Notification</td>
                <td></td>
            </tr>

            </tbody>
        </table>

    </div>

@endsection


@extends('dashboard_layout')
@section('top_title')
    User Management
@endsection
@section('page_main_name')
    User Profile
@endsection
@section('page_name')
    User Management / User Profile
@endsection

@section('body')
    <form class="row p-2 bg-white rounded" method="post" action="{{route('users.update', $user->id)}}">
        @csrf
        @method('PUT')
        <br>
        <div class="col-md-3 mb-2">
            <label for="name"><strong>Name</strong></label>
            <input type="text" id="name" class="form-control" name="name" required value="{{$user->name}}">
        </div>
        <div class="col-md-3 mb-3">
            <label for="email"><strong>Email ID</strong></label>
            <input type="text" class="form-control" id="email" required name="email" disabled value="{{$user->email}}">
        </div>


        <div class="col-md-3 mb-2">
            <label for="registration_no"><strong>Registration No</strong></label>
            <input type="text" id="registration_no" class="form-control" name="registration_no" readonly required value="{{$user->id}}-{{$user->course_work_completion}}-{{$user->program}}">
        </div>

        <div class="col-md-3 mb-2">
            <label for="mobile"><strong>Mobile</strong></label>
            <input type="text" id="mobile" class="form-control" name="mobile" required value="{{$user->mobile}}">
        </div>


        <div class="col-md-3 mb-2">
            <label for="program"><strong> Program</strong></label>
            <select name="program" class="form-control" id="program">
                <option value="PhD (CS)" @if($user->program == 'PhD (CS)') selected @endif>PhD (CS)</option>
                <option value="MS (CS)" @if($user->program == 'MS (CS)') selected @endif>MS (CS)</option>
                <option value="MS (SE)" @if($user->program == 'MS (SE)') selected @endif>MS (SE)</option>
                <option value="MS (IS)" @if($user->program == 'MS (IS)') selected @endif>MS (IS)</option>
                <option value="BS (CS)" @if($user->program == 'BS (CS)') selected @endif>BS (CS)</option>
                <option value="BS (SE)" @if($user->program == 'BS (SE)') selected @endif>BS (SE)</option>

            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="type"><strong>Level</strong></label>
            <input type="text" class="form-control" id="type" required disabled name="text" value="{{$user->type}}">
        </div>


        <div class="col-md-3 mb-2">
            <label for="course_work_completion"><strong>Course Work Completion</strong></label>
            <select class="form-control" name="course_work_completion" id="course_work_completion">
                <option value="">None</option>
                <option value="SPRING 2021" @if($user->course_work_completion == 'SPRING 2021') selected @endif>SPRING 2021</option>
                <option value="FALL 2021" @if($user->course_work_completion == 'FALL 2021') selected @endif>FALL 2021</option>
                <option value="SPRING 2022" @if($user->course_work_completion == 'SPRING 2022') selected @endif>SPRING 2022</option>
                <option value="FALL 2022" @if($user->course_work_completion == 'FALL 2022') selected @endif>FALL 2022</option>
                <option value="FALL 2022_2" @if($user->course_work_completion == 'FALL 2022_2') selected @endif>FALL 2022_2</option>
            </select>
        </div>



        <div class="col-md-3 mb-2">
            <label for="supervisor_id"><strong>Supervisor</strong></label>
            <select class="form-control" name="supervisor_id" id="supervisor_id">
                <option value="">None</option>
                @foreach(\App\Models\Supervisor::all() as $item)
                    <option value="{{$item->id}}" @if($user->supervisor_id == $item->id) selected @endif>{{$item->name}}</option>
                @endforeach

            </select>
        </div>





        <div class="col-md-3 mb-2">
            <button class="btn btn-danger" type="submit">Update</button>
        </div>
    </form>
@endsection


@extends('dashboard_layout')
@section('top_title')
    User Management
@endsection
@section('page_main_name')
    Create New User
@endsection
@section('page_name')
    User Management / Create User
@endsection

@section('body')
    <form class="row p-2 bg-white rounded" method="post" action="{{route('users.store')}}">
        @csrf
        <br>
        <div class="col-md-3 mb-2">
            <label for="name"><strong>Name</strong></label>
            <input type="text" id="name" class="form-control" name="name" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="email"><strong>Email ID</strong></label>
            <input type="text" class="form-control" id="email" required name="email">
        </div>
        <div class="col-md-3 mb-3">
            <label for="password"><strong>Password</strong></label>
            <input type="password" class="form-control" id="password" required name="password">
        </div>
        <div class="col-md-3 mb-2">
            <label for="role"><strong>Role</strong></label>
            <select class="form-control select2bs4" required id="role" style="width: 100%;" name="role">
                <option value="">None</option>
                <option value="Student">Student</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Evaluator">Evaluator</option>
                <option value="In-charge">In-charge</option>
                <option value="Super-Admin">Super-Admin</option>
            </select>
        </div>



        <div class="col-md-3 mb-2">
            <label for="registration_no"><strong>Registration No</strong></label>
            <input type="text" id="registration_no" class="form-control" name="registration_no" required>
        </div>

        <div class="col-md-3 mb-2">
            <label for="mobile"><strong>Mobile</strong></label>
            <input type="text" id="mobile" class="form-control" name="mobile" required>
        </div>


        <div class="col-md-3 mb-2">
            <label for="program"><strong> Program</strong></label>
            <select name="program" class="form-control" id="program">
                <option value="PhD (CS)">PhD (CS)</option>
                <option value="MS (CS)" >MS (CS)</option>
                <option value="MS (SE)" >MS (SE)</option>
                <option value="MS (IS)" >MS (IS)</option>
                <option value="BS (CS)" >BS (CS)</option>
                <option value="BS (SE)" >BS (SE)</option>

            </select>
        </div>


        <div class="col-md-3 mb-2">
            <label for="course_work_completion"><strong>Course Work Completion</strong></label>
            <select class="form-control" name="course_work_completion" id="course_work_completion">
                <option value="">None</option>
                <option value="SPRING 2021">SPRING 2021</option>
                <option value="FALL 2021" >FALL 2021</option>
                <option value="SPRING 2022" >SPRING 2022</option>
                <option value="FALL 2022" >FALL 2022</option>
                <option value="FALL 2022_2" >FALL 2022_2</option>
            </select>
        </div>



        <div class="col-md-3 mb-2">
            <label for="supervisor_id"><strong>Supervisor</strong></label>
            <select class="form-control" name="supervisor_id" id="supervisor_id">
                <option value="">None</option>
                @foreach(\App\Models\Supervisor::all() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="col-md-9 mb-2">
        </div>

        <button class="btn btn-danger" type="submit">Create User</button>
    </form>
@endsection


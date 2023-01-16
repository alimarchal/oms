@extends('dashboard_layout')
@section('top_title')
    User Management
@endsection
@section('page_main_name')
    Create User
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
        <button class="btn btn-danger" type="submit">Create User</button>
    </form>
@endsection


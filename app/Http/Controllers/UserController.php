<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = QueryBuilder::for(User::with('roles'))
            ->allowedFilters([
                AllowedFilter::scope('name'),
                AllowedFilter::exact('email'),
            ])->paginate(10)->withQueryString();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $role1 = Role::create(['name' => 'Student']);
//        $role2 = Role::create(['name' => 'Supervisor']);
//        $role3 = Role::create(['name' => 'Evaluator']);
//        $role4 = Role::create(['name' => 'In-charge']);
//        $role5 = Role::create(['name' => 'Super-Admin']);
//
//
//
//        $permission1 = Permission::create(['name' => 'create']);
//        $permission2 = Permission::create(['name' => 'read']);
//        $permission3 = Permission::create(['name' => 'update']);
//        $permission4 = Permission::create(['name' => 'delete']);

//        dd('readched');

//        $role1->syncPermissions(['create','read','update','delete']);
//        $permission->syncRoles($roles);

//
//        //
//        $permission1 = Permission::create(['name' => 'Course Registration']);
//        $permission2 = Permission::create(['name' => 'View Register Courses']);
//        $permission3 = Permission::create(['name' => 'Submit Synopsis']);
//        $permission4 = Permission::create(['name' => 'Submit Thesis']);
//        $permission5 = Permission::create(['name' => 'View Supervisor']);
//
//        $permission6 = Permission::create(['name' => 'View Register Student Detail']);
//        $permission7 = Permission::create(['name' => 'View Student Synopsis']);
//        $permission8 = Permission::create(['name' => 'View Student Thesis']);
//        $permission9 = Permission::create(['name' => 'Register Student']);
//
//        $permission10 = Permission::create(['name' => 'View Student Thesis']);
//        $permission11 = Permission::create(['name' => 'View Student Synopsis']);
//        $permission12 = Permission::create(['name' => 'Manage Schedule']);
//        $permission13 = Permission::create(['name' => 'Evaluate Synopsis']);
//        $permission14 = Permission::create(['name' => 'Give Remarks']);
//        $permission15 = Permission::create(['name' => 'Generate Report']);
//        $permission16 = Permission::create(['name' => 'Send Report To Incharge']);
//
//        $permission17 = Permission::create(['name' => 'Make Committee']);
//        $permission18 = Permission::create(['name' => 'See Report Other Evaluator']);
//        $permission19 = Permission::create(['name' => 'View Student Detail']);
//        $permission20 = Permission::create(['name' => 'View Student Synopsis']);
//        $permission21 = Permission::create(['name' => 'View Student Thesis']);

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

//        dd($request->all());

        $role = Role::where('name', $request->role)->first();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->role,
            'registration_no' => $request->registration_no,
            'mobile' => $request->mobile,
            'program' => $request->program,
            'course_work_completion' => $request->course_work_completion,
            'supervisor_id' => $request->supervisor_id,
        ]);
        $user->assignRole($role);
        Artisan::call('permission:cache-reset');
        return to_route('users.index');
    }

    public function userProfile(Request $request)
    {
        $user = auth()->user();
        return view('users.userProfile', compact('user'));
    }


    public function viewSupervisor(Request $request)
    {
        $supervisor = auth()->user()->supervisor;
        return view('users.viewSupervisor',compact('supervisor'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        session()->flash('message', 'User profile has been updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

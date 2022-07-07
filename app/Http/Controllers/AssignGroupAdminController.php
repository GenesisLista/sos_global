<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;

use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;

class AssignGroupAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id',2)->with(['groups'])->get();
        return view('assign_group_admin.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group_admin = User::whereRoleId(2)->get();
        $group = Group::all();
        return view('assign_group_admin.create')->with([
            'group_admin' => $group_admin,
            'group' => $group
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->group_admin);
        $user->groups()->detach();
        foreach($request->assign_group as $group_id)
        {
            // Pivot table
            $user->groups()->attach([$group_id]);
        }

        return redirect()->route('assign-group-admin.index')->with('success_add', 'Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group_admin = User::whereId($id)->with(['groups'])->first();
        $group = Group::all();
        return view('assign_group_admin.edit')->with([
            'group_admin' => $group_admin,
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->groups()->detach();
        foreach($request->assign_group as $group_id)
        {
            // Pivot table
            $user->groups()->attach([$group_id]);
        }

        return redirect()->route('assign-group-admin.index')->with('success_update', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

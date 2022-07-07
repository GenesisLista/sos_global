<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\CustomerGroup;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Gate;

class AssignCustomerController extends Controller
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
        if(Gate::allows('isSuperAdmin')){
            $customer = User::with(['customer_groups.groups','customer_groups.users'])
            ->whereRoleId(3)
            ->orWhereNull('role_id')
            ->get();
        }else {
            $customer = User::with(['customer_groups.groups','customer_groups.users'])
            ->orWhereNull('role_id')
            ->get();
        }

        return view('assign_customer.index')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user_details = User::findOrFail($id);
        $customer = CustomerGroup::where('user_id',$id)->first();
        $group = Group::all();
        return view('assign_customer.edit')->with([
            'customer' => $customer,
            'group' => $group,
            'user_details' => $user_details
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        // Update the role
        $user = User::findOrFail($id);
        $user->role_id = 3;
        $user->save();

        /**
         * Delete first the customer if
         * already exist
         */
        $customer_delete = CustomerGroup::where('user_id', $id)->delete();

        // Add in customer_groups
        $customer_group = new CustomerGroup();
        $customer_group->group_id = $request->assign_group;
        $customer_group->user_id = $user->id;
        $customer_group->save();

        return redirect()->route('assign-customer.index')->with('success_update', 'Record updated successfully');
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

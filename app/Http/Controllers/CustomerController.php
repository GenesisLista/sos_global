<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
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
        $user_id = Auth::user()->id;
        $voucher_default = 10;
        $voucher_count = Voucher::whereUserId($user_id)->count();
        $voucher_remaining = $voucher_default - $voucher_count;
        $voucher = Voucher::whereUserId($user_id)->get();

        // Group details
        $group = CustomerGroup::with(['groups'])->findOrFail($user_id);
        return view('customer.index')->with([
            'voucher' => $voucher,
            'voucher_remaining' => $voucher_remaining,
            'group' => $group
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucher_code = Str::upper(Str::random(10));

        return view('customer.create')->with([
            'voucher_code' => $voucher_code
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Voucher $voucher)
    {
        $user_id = Auth::user()->id;
        
        $voucher->user_id = $user_id;
        $voucher->code = $request->voucher_code;
        $voucher->save();
        
        return redirect()->route('customer.index')->with('success_add', 'Record added successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voucher::destroy($id);
        return redirect()->route('customer.index')->with('success_deleted', 'Record deleted successfully');
    }
}

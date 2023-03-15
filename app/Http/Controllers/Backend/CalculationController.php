<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Company;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user= Auth::user();
        $company= $user->company;

        $payments= $company ? $company->payments()->get() : [];
        $calculations= $company ? $company->calculation->get() : [];
        
        // dd($calculations->main);

        $id=Auth::user()->id;

        $companies = Company::select()        
        ->where('user_id', '=', $id)
        ->get();

        return view('backend.payments.index', compact('calculations', 'payments', 'companies'));
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
        // dd($request->all());

        $request->validate([
            'main',
            'company_id',
        ]);

        Calculation::create($request->all());
        return redirect()->route('admin.home')
            ->with('success', 'Calculation created successfully.');
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
    public function update(Request $request, Calculation $calculation)
    {
        $calculation->update($request->all());
        return redirect()->route('admin.home')
        ->with('success', 'Calculation updated successfully.');

        
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

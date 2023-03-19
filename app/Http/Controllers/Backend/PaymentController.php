<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Point;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
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

        $id = Auth::user()->id;

        $companies = Company::select()

            ->where('user_id', '=', $id)

            ->get();

        // dd($payments);

        return view('backend.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Auth::user()->id;

        $companies = Company::select()
        
        ->where('user_id', '=', $id)

        ->get();

        $user= Auth::user();
        $company= $user->company;

        $customers= $company ? $company->customers()->get() : []; 

        return view('backend.payments.create', compact('companies','customers'));
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
            'customer_id' => 'required',
            'total' => 'required',

        ]);

        $user = Auth::user();
        $company = $user->company;
        $calculation = $company ? $company->calculation: [];

        $main = $calculation->main;

        $cal = $request->total / $main;

        $customer = Point::where('customer_id', $request->customer_id)
        ->where('company_id', $request->company_id)
        ->first();

        $customer->point = $customer->point + $cal;

        $customer->save();

        Payment::create($request->all());

     
        return redirect()->route('payments.index')
                        ->with('success','Payment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('backend.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        // dd($payment->total);

        $id=Auth::user()->id;

        $companies = Company::select()
        
        ->where('user_id', '=', $id)

        ->get();

        $user= Auth::user();
        $company= $user->company;

        $customers= $company ? $company->customers()->get() : []; 

        return view('backend.payments.edit', compact('payment', 'customers', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $user = Auth::user();
        $company = $user->company;
        $calculation = $company ? $company->calculation: [];

        $main = $calculation->main;

        $oldCal = $payment->total / $main;

        $customer = Point::where('customer_id', $request->customer_id)
        ->where('company_id', $request->company_id)
        ->first();

        $customer->point = $customer->point - $oldCal;

        $customer->save();


        $cal = $request->total / $main;

        $customer->point = $customer->point + $cal;

        $customer->save();

        $payment->update($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {

        $user = Auth::user();
        $company = $user->company;
        $calculation = $company ? $company->calculation: [];

        $main = $calculation->main;

        $cal = $payment->total / $main;

        $customer = Point::where('customer_id', $payment->customer_id)
            ->where('company_id', $payment->company_id)
            ->first();

        $customer->point = $customer->point - $cal;
       
        $customer->save();

        $payment->delete();

        return redirect()->route('payments.index')
        ->with('success', 'Payment deleted successfully');
    }

    public function customerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address'=> 'required',
            // 'user_id' => 'required',
        ]);

        $customer=Customer::create($request->all());

        $customer_id = $customer->id;
        $company_id = $customer->company_id;


        Point::create([
            'customer_id' => $customer_id,
            'company_id' => $company_id,
            'point' => 0,
        ]);


        return redirect()->route('payments.create')
        ->with('success','Customer created successfully.');
    }

}

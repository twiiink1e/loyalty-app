<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Point;
use App\Models\Redeem;
use App\Models\Reward;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RedeemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $company = $user->company;
        $redeems = $company ? $company->redeems()->get() : [];

        return view('backend.redeems.index', compact('redeems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $company = $user->company;
        $rewards = $company ? $company->rewards()->get() : [];

        $customers = $company ? $company->customers()->get() : [];

        $id = Auth::user()->id;

        $companies = Company::select()

            ->where('user_id', '=', $id)

            ->get();

        return view('backend.redeems.create', compact('rewards', 'customers', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'reward_id' => 'required',
            // 'status' => 'required',
        ]);

        $reward = Reward::where('id', $request->reward_id)
            ->first();

        $credit = $reward->point;

        $customer = Point::where('customer_id', $request->customer_id)
            ->where('company_id', $request->company_id)
            ->first();

        if (($customer->point - $credit) <= -1) {
            $user = Auth::user();
            $company = $user->company;

            $rewards = $company ? $company->rewards()->get() : [];

            $customers = $company ? $company->customers()->get() : [];

            $id = Auth::user()->id;

            $companies = Company::select()

                ->where('user_id', '=', $id)

                ->get();

            $data['rewards'] = $rewards;
            $data['customers'] = $customers;
            $data['companies'] = $companies;

            return view('backend.redeems.create',  $data)
                ->with('success', 'Not enough point');

            // return redirect()->route('redeems.create', compact('rewards', 'customers', 'companies'))
            //     ->with('success', 'Not enough point')->with($request->all());
        }

        $customer->point = $customer->point - $credit;

        $customer->save();

        $input = [
            'company_id' => $request->company_id,
            'customer_id' => $request->customer_id,
            'reward_id' => $request->reward_id,
            'code' => $this->generateUniqueCode()
        ];

        // dd($input);

        Redeem::create($input);

        return redirect()->route('redeems.index')
            ->with('success', 'Redeem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Redeem $redeem)
    {
        return view('backend.redeems.show', compact('redeem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Redeem $redeem)
    {

        $user = Auth::user();
        $company = $user->company;
        $rewards = $company ? $company->rewards()->get() : [];

        $customers = $company ? $company->customers()->get() : [];

        $id = Auth::user()->id;

        $companies = Company::select()

            ->where('user_id', '=', $id)

            ->get();

        return view('backend.redeems.edit', compact('redeem', 'rewards', 'customers', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redeem $redeem)
    {
        $oldRedeem = $redeem->reward->point;

        $customer = Point::where('customer_id', $request->customer_id)
            ->where('company_id', $request->company_id)
            ->first();

        $customer->point = $customer->point + $oldRedeem;
       
        $customer->save();

        $reward = Reward::where('id', $request->reward_id)
            ->first();

        $credit = $reward->point;

        // dd($credit);

        $request->validate([
            'customer_id' => 'required',
            'reward_id' => 'required',
        ]);

        $customer = Point::where('customer_id', $request->customer_id)
            ->where('company_id', $request->company_id)
            ->first();


        if (($customer->point - $credit) <= -1) {
            $user = Auth::user();
            $company = $user->company;
            $rewards = $company ? $company->rewards()->get() : [];

            $customers = $company ? $company->customers()->get() : [];

            $id = Auth::user()->id;

            $companies = Company::select()

                ->where('user_id', '=', $id)

                ->get();

            $data['rewards'] = $rewards;
            $data['customers'] = $customers;
            $data['companies'] = $companies;

            return view('backend.redeems.create',  $data)
                ->with('success', 'Not enough point');

            // return redirect()->route('redeems.create', compact('rewards', 'customers', 'companies'))
            //     ->with('success', 'Not enough point')->with($request->all());
        }

        $customer->point = $customer->point - $credit;

        $customer->save();

        $redeem->update($request->all());

        return redirect()->route('redeems.index')
            ->with('success', 'Redeem updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redeem $redeem)
    {
        $oldRedeem = $redeem->reward->point;

        $customer = Point::where('customer_id', $redeem->customer_id)
            ->where('company_id', $redeem->company_id)
            ->first();

        $customer->point = $customer->point + $oldRedeem;
       
        $customer->save();

        if ($redeem->status === 'pending'){
            $redeem->update(['status' => 'canceled']);
            return redirect()->route('redeems.index');
        } else {
            $redeem->update(['status' => 'canceled']);
            return redirect()->route('redeems.index');
        }
        
        return redirect()->route('redeems.index')
        ->with('success', 'Redeem canceled successfully.');
    }

    public function updateStatus($id)
    {
        $redeem = Redeem::find($id);
        
        // dd($redeem->id);

        if ($redeem->status === 'pending'){
            $redeem->update(['status' => 'success']);
            return redirect()->route('redeems.index');
        } else {
            $redeem->update(['status' => 'pending']);
            return redirect()->route('redeems.index');
        }
        return redirect()->route('redeems.index')
        ->with('success', 'Status updated successfully.');
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000, 99999);
        } while (Redeem::where("code", "=", $code)->first());
  
        return $code;
    }
}

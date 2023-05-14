<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Point;
use App\Models\Redeem;
use App\Models\Reward;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class AnnouncementFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $current_date = Carbon::now();

        $announcements = Announcement::select()
            ->whereDate('expire', '>=', $current_date)
            ->orderBy('id', 'DESC')
            ->get();

        $companies = Company::get();

        return view('frontend.announcements.index', compact('announcements', 'companies'));
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
        $request->validate([
            'customer_id' => 'required',
            'reward_id' => 'required',
            // 'status' => 'required',
        ]);

        $phone = Auth::user()->phone;

        $reward = Reward::where('id', $request->reward_id)
            ->first();

        $credit = $reward->point;

        $customer = Point::select()
            ->where(function ($query) use ($phone) {
                $query->whereHas('customer', function ($query) use ($phone) {
                    $query->where('phone', 'like', '%' . $phone . '%');
                });
            })

            ->where('company_id', $request->company_id)
            ->first();

        // dd($customer);

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

            return  redirect()->back()->with('success', 'Sorry, you do not have enough point');
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

        return redirect()->route('histories.index')
            ->with('success', 'Redeem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(Announcement::find($id)->topic);

        $announcement = Announcement::find($id);

        $company = $announcement->company->id;
        // dd($company);

        $phone = Auth::user()->phone;

        $points = Point::select()
            ->where('company_id', '=', $company)

            ->where(function ($query) use ($phone) {
                $query->whereHas('customer', function ($query) use ($phone) {
                    $query->where('phone', 'like', '%' . $phone . '%');
                });
            })

            ->get();

        $customer = Customer::select()
            ->where('phone', $phone)
            ->first();

        // dd($customer);

        // dd($point->point);

        return view('frontend.announcements.show', compact('announcement', 'points', 'customer'));
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
        //
    }

    public function search(Request $request)
    {

        // dd($request->all());

        $current_date = Carbon::now();

        $companies = Company::get();

        $inputSelect = $request->input('inputSelect');

        $data['inputSelect'] = $inputSelect;

        // dd($inputSelect);

        $inputSearch = $request->input('inputSearch');

        $announcements = Announcement::select()

            ->whereDate('expire', '>=', $current_date)

            ->where(function ($query) use ($inputSelect) {
                if ($inputSelect) {
                    $query->where('company_id', $inputSelect);
                }
            })


            ->where(function ($query) use ($inputSearch) {
                $query->whereHas('reward', function ($query) use ($inputSearch) {
                    $query->where('name', 'like', '%' . $inputSearch . '%');
                });
            })

            ->orWhere(function ($query) use ($inputSearch) {
                if ($inputSearch) {
                    $query->where('topic', 'like', '%' . $inputSearch . '%');
                }
            })

            // ->orWhere(function($query) use ($inputSearch){
            //     $query->whereHas('company', function($query) use ($inputSearch){
            //         $query->where('name', 'like', '%'.$inputSearch.'%');
            //     });
            // })

            ->get();

        return view('frontend.announcements.index', compact('announcements', 'companies'), $data);
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000, 99999);
        } while (Redeem::where("code", "=", $code)->first());

        return $code;
    }
}

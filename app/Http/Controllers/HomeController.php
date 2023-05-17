<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\Redeem;
use App\Models\Reward;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current_date = Carbon::now();

        $announcements = Announcement::select()
            ->whereDate('expire', '>', $current_date)
            ->get();

        $companies = Company::get();



        return view('newwelcome', compact('announcements', 'companies'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {

        $current_date = Carbon::now();
        $user = Auth::user();
        $company = $user->company;
        $rewards = $company ? $company->rewards()->get() : [];
        $calculations = $company ? $company->calculation()->get() : [];

        // dd($rewards);

        $reward_name = $rewards->toArray();

        // dd($reward_name);
    
        $reward_name = array_column($reward_name, 'name');

        // dd($reward_name);

        $company_id = $company->id;

        $id = Auth::user()->id;

        $companies = Company::select()
            ->where('user_id', '=', $id)
            ->get();

        $customerCount = $company->customers()->count();
        $rewardCount = $company->rewards()->count();
        $redeemCount = $company->redeems()->count();

        $announcementCount = $company->announcements()
        ->whereDate('expire', '>', $current_date)
        ->count();

        // $redeems = $company ? $company->redeems()->get() : [];

        $count_redeems = Redeem::groupBy('reward_id')
            ->selectRaw('count(*) as total, reward_id')
            ->where('company_id', $company_id)
            ->get()->toArray();
        
        $count_redeems = array_column($count_redeems, 'total');


        return view('backend.maindashboard',
            compact('companies', 'rewards', 'company', 'calculations', 'rewardCount', 'announcementCount', 'customerCount', 'redeemCount'))
        ->with('count_redeems',json_encode($count_redeems,JSON_NUMERIC_CHECK))
        ->with('reward_name',json_encode($reward_name, JSON_NUMERIC_CHECK));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        $users = User::select()
        ->where('type', '!=', '2')
        ->get();
        return view('manager.users.index', compact('users'));
    }
}

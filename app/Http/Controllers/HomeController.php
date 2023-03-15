<?php
  
namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Redeem;
use App\Models\Reward;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $user= Auth::user();
        $company= $user->company;
        $rewards= $company ? $company->rewards()->get() : [];
        $calculations= $company ? $company->calculation()->get() : [];

        $company_id = $company->id;

        $id=Auth::user()->id;

        $companies = Company::select()        
        ->where('user_id', '=', $id)
        ->get();

        $customerCount = $company->customers()->count();
        $rewardCount = $company->rewards()->count();
        $announcementCount = $company->announcements()->count();
        $redeemCount = $company->redeems()->count();

        return view('backend.maindashboard', compact('companies', 'rewards', 'company', 'calculations', 'rewardCount', 'announcementCount', 'customerCount', 'redeemCount'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
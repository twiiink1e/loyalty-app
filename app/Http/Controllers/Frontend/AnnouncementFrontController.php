<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Company;
use App\Models\Reward;
use Illuminate\Http\Request;

class AnnouncementFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::get();
        return view('frontend.announcement', compact('announcements'));
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

        $inputSearch = $request->input('inputSearch');

        $company = Company::get();
        $reward = Reward::get();

        $announcements = Announcement::select()
        
        ->where(function($query) use ($inputSearch){
           if ($inputSearch){
            $query->where('topic', 'like', $inputSearch);
           }
        }) 
        ->orWhere(function($query) use ($inputSearch){
           if ($inputSearch){
            $query->where('reward_id', 'like', $inputSearch);
           }
        }) 
        ->orWhere(function($query) use ($inputSearch){
           if ($inputSearch){
            $query->where('company_id', 'like', $inputSearch);
           }
        }) 

        ->get();
    
        return view('frontend.announcement', compact('announcements'));
        
    }
}

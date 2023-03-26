<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Company;
use App\Models\Reward;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
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
        $announcements= $company ? $company->announcements()->get() : [];

        return view('backend.announcements.index', compact('announcements'));
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
        $rewards= $company ? $company->rewards()->get() : [];

        return view('backend.announcements.create', compact('companies', 'rewards'));
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
            'topic' => 'required',
            'description' => 'required',

        ]);

        $input = $request->all();
  
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'thumbnails/';
            $coverImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $coverImage);
            $input['thumbnail'] = "$coverImage";
        }

        // dd($input);
    
        Announcement::create($input);
     
        return redirect()->route('announcements.index')
                        ->with('success','Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        // dd($announcement);

        return view('backend.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $id=Auth::user()->id;

        $companies = Company::select()
        
        ->where('user_id', '=', $id)

        ->get();
        
        $user= Auth::user();
        $company= $user->company;
        $rewards= $company ? $company->rewards()->get() : [];

        return view('backend.announcements.edit', compact('announcement', 'rewards', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'topic' => 'required',
            'description' => 'required',

        ]);

        $input = $request->all();

        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'thumbnails/';
            $coverImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $coverImage);
            $input['thumbnail'] = "$coverImage";
        }else{
            unset($input['thumbnail']);
        }
          
        $announcement->update($input);

        return redirect()->route('announcements.index')
        ->with('success','Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcements.index')
        ->with('success', 'Announcement deleted successfully');
    }
}

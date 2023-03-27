<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Company;
use App\Models\Reward;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RewardController extends Controller
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
        $rewards= $company ? $company->rewards()->get() : [];

        return view('backend.rewards.index', compact('rewards'));
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

        return view('backend.rewards.create', compact('companies'));
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
            'name' => 'required',
            'point' => 'required',

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'rewardImages/';
            $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $coverImage);
            $input['image'] = "$coverImage";
        }
    
        Reward::create($input);
     
        return redirect()->route('rewards.index')
                        ->with('success','Reward created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        return view('backend.rewards.show', compact('reward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        $id=Auth::user()->id;

        $companies = Company::select()
        
        ->where('user_id', '=', $id)

        ->get();

        return view('backend.rewards.edit', compact('reward', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'name' => 'required',
            'point' => 'required',

        ]);

        // dd($request->all());

        $input = $request->all();

        // dd($input);

        if ($image = $request->file('image')) {
            $destinationPath = 'rewardImages/';
            $coverImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $coverImage);
            $input['image'] = "$coverImage";
        }else{
            unset($input['image']);
        }
        
        $reward->update($input);

        // $reward->update($request->all());
     
        return redirect()->route('rewards.index')
                        ->with('success','Reward updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();

        return redirect()->route('rewards.index')
        ->with('success', 'Reward deleted successfully');
    }
}

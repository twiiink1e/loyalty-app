<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();

        return view('backend.companies.create', compact('users'));
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

        $company=new Company();

        $image=$request->logo;
        $filename=time().'.'.$image->getClientOriginalExtension();
        $request->logo->move('logos',$filename);
        $company->logo=$filename;


        $company->user_id=$request->user_id;
        $company->name=$request->name;
        $company->phone=$request->phone;
        $company->address=$request->address;
        $company->save();

        return redirect()->route('admin.home');
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
    public function edit(Company $company)
    {
        $user= Auth::user();
        $company= $user->company;

        if (empty(Auth::user()->company->id)) {
            return view('backend.companies.create');

        } else {
            return view('backend.companies.edit', compact('company'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();

        if ($logo = $request->file('logo')) {
            $destinationPath = 'logos/';
            $coverImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $coverImage);
            $input['logo'] = "$coverImage";
        }else{
            unset($input['logo']);
        }

        $company = Company::find(Auth::user()->company->id);

        $company->update($input);

        return redirect()->route('admin.home');
        
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

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Redeem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class PointFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phone=Auth::user()->phone;

        // dd($phone);

        $points = Point::select()
        ->where(function($query) use ($phone){
            $query->whereHas('customer', function($query) use ($phone){
                $query->where('phone', 'like', '%'.$phone.'%');
            });
        })
        ->get();

        
        return view('frontend.points.index', compact('points'));

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
        $phone=Auth::user()->phone;

        $point = Point::find($id);

        $company = $point->company_id;
        
        $cal = Calculation::select()
        ->where('company_id', $company)
        ->first();

        // dd($cal);

        $payments = Payment::orderBy('id', 'DESC')->select()
        ->where('company_id', '=', $company )

        ->where(function($query) use ($phone){
            $query->whereHas('customer', function($query) use ($phone){
                $query->where('phone', 'like', '%'.$phone.'%');
            });
        })

        ->get();

        $redeems = Redeem::orderBy('id', 'DESC')->select()
        ->where('company_id', '=', $company )

        ->where(function($query) use ($phone){
            $query->whereHas('customer', function($query) use ($phone){
                $query->where('phone', 'like', '%'.$phone.'%');
            });
        })

        ->get();
    
        return view('frontend.points.show', compact('point', 'payments', 'cal', 'redeems'));
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
}

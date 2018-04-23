<?php

namespace App\Http\Controllers;

use App\MerchantSession;
use Illuminate\Http\Request;

class MerchantSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchant_sessions = MerchantSession::all();
        return view('merchant_sessions.index', 'merchant_sessions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant_sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'cash_start' => 'required'
        ]);
        $merchantsession = New MerchantSession;

        $merchantsession->cash_start = request('cash_start');

        $merchantsession->cash_end = request('cash_start'); //Use cash start as initial value. This will change as updated.

        $merchantsession->save();

        return redirect('/merchantsessions');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MerchantSession  $merchantSession
     * @return \Illuminate\Http\Response
     */
    public function show(MerchantSession $merchantSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MerchantSession  $merchantSession
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantSession $merchantSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MerchantSession  $merchantSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MerchantSession $merchantSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MerchantSession  $merchantSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerchantSession $merchantSession)
    {
        //
    }
}

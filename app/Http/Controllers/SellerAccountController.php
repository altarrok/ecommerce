<?php

namespace App\Http\Controllers;

use App\SellerAccount;
use Illuminate\Http\Request;

class SellerAccountController extends Controller
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
     * @param  \App\SellerAccount  $sellerAccount
     * @return \Illuminate\Http\Response
     */
    public function show(SellerAccount $sellerAccount)
    {
        $products = $sellerAccount->inventory->products->reverse();
        return view('seller_account.show', compact('sellerAccount', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerAccount  $sellerAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerAccount $sellerAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerAccount  $sellerAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerAccount $sellerAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerAccount  $sellerAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerAccount $sellerAccount)
    {
        //
    }
}

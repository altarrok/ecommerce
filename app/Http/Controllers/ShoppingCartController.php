<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckCustomer;
use App\Product;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShoppingCartController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware(CheckCustomer::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping_cart = auth()->user()->account->shoppingCart;
        return view('shopping_cart.index', compact('shopping_cart'));
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
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }

    public function addItem(Product $product) {
        try {
            auth()->user()->account->shoppingCart->products()->attach($product);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function checkout() {
        $shoppingCart = Auth::user()->account->shoppingCart;
        return view('shopping_cart.checkout', compact('shoppingCart'));
    }

    public function removeProduct(Product $product) {
        auth()->user()->account->shoppingCart->products()->detach($product);
        return Redirect::back();
    }

    public function paid() {
        Auth::user()->account->shoppingCart->products()->detach();
        return redirect(route('index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\admin\Marketplace;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marketplaceModel = new Marketplace();
        $marketplaces = $marketplaceModel->all();

        return view('seller.create', ['marketplaces' => $marketplaces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sellerModel = new Seller();

        // dd($request->post());

        $setSellerData = [
            'name' => $request->post('name'),
            'surname' => $request->post('surname'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'id_marketplace' => $request->post('id_marketplace'),
        ];

        $seller_id = $sellerModel->store($setSellerData);

        $setSellerPassword = [
            'id_seller' => $seller_id,
            'password' => $request->post('password')
        ];

        // $requestMarketplace->

        $sellerModel->storePassword($setSellerPassword);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }

    public function autorize()
    {
        return redirect()->route('index');
    }
}

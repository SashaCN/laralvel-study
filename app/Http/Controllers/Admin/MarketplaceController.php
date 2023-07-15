<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarketplaceRequest;
use App\Models\admin\Marketplace;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function create()
    {
        return view('admin.marketplace.create');
    }
    public function update($idMarketplace)
    {
        $marketplaceModel = new Marketplace();
        $marketplace = $marketplaceModel->find($idMarketplace);
        // $marketplace = $marketplaceModel->where('id_marketplace', $id)->getFirst();

        return view('admin.marketplace.update', ['marketplace' => $marketplace]);
    }
    public function delete($idMarketplace)
    {
        $marketplaceModel = new Marketplace();
        $marketplace = $marketplaceModel->deleteMarketplace($idMarketplace);
        // $marketplace = $marketplaceModel->where('id_marketplace', $id)->getFirst();

        return redirect()->route('admin.marketplaces');
    }
    public function viewAll()
    {
        $marketplaceModel = new Marketplace();
        $marketplaces = $marketplaceModel->all();
        $content = [
            'marketplaces' => $marketplaces
        ];

        return view('admin.marketplace.marketplaces', $content);
    }

    public function store(Request $request)
    {
        $marketplaceModel = new Marketplace();

        $setMarketplaceData = [
            'country_code' => strtoupper($request->post('country_code')),
            'country' => $request->post('country'),
            'currency' => strtoupper($request->post('currency'))
        ];

        $idMarketplace = $request->post('marketplace_id');

        if (!empty($idMarketplace)) {
            $marketplaceModel->updateMarketplace($idMarketplace, $setMarketplaceData);

        } else {
            $marketplaceModel->saveMarketplace($setMarketplaceData);
        }




        return redirect()->route('admin.marketplaces');
    }
}

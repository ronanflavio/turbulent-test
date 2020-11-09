<?php

namespace App\Http\Controllers;

use App\Actions\TopSellingProductsAction;
use App\DataTransferObjects\TopSellingProductsData;
use App\Http\Requests\TopSellingProductsRequest;

class ReportsController extends Controller
{
    public function topSellingProducts(TopSellingProductsRequest $request, TopSellingProductsAction $action)
    {
        $data = TopSellingProductsData::fromRequest($request);
        $response = $action($data);
        return response()->json($response);
    }
}

<?php

namespace App\DataTransferObjects;

use App\Http\Requests\TopSellingProductsRequest;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class TopSellingProductsData extends DataTransferObject
{
    /** @var Carbon\Carbon */
    public $startDate;

    /** @var Carbon\Carbon */
    public $endDate;

    public static function fromRequest(TopSellingProductsRequest $request)
    {
        return new self([
            'startDate' => Carbon::make($request->startDate),
            'endDate' => Carbon::make($request->endDate)
        ]);
    }
}

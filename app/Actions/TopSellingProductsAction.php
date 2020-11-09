<?php

namespace App\Actions;

use App\DataTransferObjects\TopSellingProductsData;
use App\Models\OrderLog;
use App\Models\Sku;
use Illuminate\Support\Facades\DB;

class TopSellingProductsAction
{
    public function __invoke(TopSellingProductsData $data)
    {
        $sku = Sku::tableName();
        $orderLog = OrderLog::tableName();

        return Sku::select([
                DB::raw('count('.$orderLog.'.skuId'.') as count'),
                $orderLog.'.skuId',
                $sku.'.name'
            ])
            ->join($orderLog, $orderLog.'.skuId', '=', $sku.'.id')
            ->where([
                [$orderLog.'.time_created', '>=', $data->startDate],
                [$orderLog.'.time_created', '<=', $data->endDate],
            ])
            ->orderBy(DB::raw('COUNT('.$orderLog.'.skuId'.')'), 'desc')
            ->groupBy([$orderLog.'.skuId', $sku.'.name'])
            ->get();
    }
}

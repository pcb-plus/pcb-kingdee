<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\MfgOrder;

class MfgOrderService extends BillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\MfgOrder
     */
    protected function newBillModel()
    {
        return new MfgOrder();
    }
}
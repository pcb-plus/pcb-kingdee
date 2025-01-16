<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\SalesOrder;

class SalesOrderService extends AbstractBillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\SalesOrder
     */
    protected function newBillModel()
    {
        return new SalesOrder();
    }
}

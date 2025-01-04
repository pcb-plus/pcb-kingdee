<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\DeliveryNotice;

class DeliveryNoticeService extends BillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\DeliveryNotice
     */
    protected function newBillModel()
    {
        return new DeliveryNotice();
    }
}

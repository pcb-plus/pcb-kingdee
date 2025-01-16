<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\MisDelivery;

class MisDeliveryService extends AbstractBillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\MisDelivery
     */
    protected function newBillModel()
    {
        return new MisDelivery();
    }
}

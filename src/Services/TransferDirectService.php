<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\TransferDirect;

class TransferDirectService extends BillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\TransferDirect
     */
    protected function newBillModel()
    {
        return new TransferDirect();
    }
}

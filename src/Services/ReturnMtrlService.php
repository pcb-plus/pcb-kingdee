<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\ReturnMtrl;

class ReturnMtrlService extends BillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\ReturnMtrl
     */
    protected function newBillModel()
    {
        return new ReturnMtrl();
    }
}

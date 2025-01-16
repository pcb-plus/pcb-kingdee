<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\ReturnMtrl;

class ReturnMtrlService extends AbstractBillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\ReturnMtrl
     */
    protected function newBillModel()
    {
        return new ReturnMtrl();
    }
}

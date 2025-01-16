<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\PickMtrl;

class PickMtrlService extends AbstractBillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\PickMtrl
     */
    protected function newBillModel()
    {
        return new PickMtrl();
    }
}

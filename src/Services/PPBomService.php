<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\PPBom;

class PPBomService extends BillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\PPBom
     */
    protected function newBillModel()
    {
        return new PPBom();
    }
}

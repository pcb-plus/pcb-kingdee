<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\Miscellaneous;

class MiscellaneousService extends BillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\Miscellaneous
     */
    protected function newBillModel()
    {
        return new Miscellaneous();
    }
}

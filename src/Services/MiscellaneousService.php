<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\Miscellaneous;

class MiscellaneousService extends AbstractBillService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\Miscellaneous
     */
    protected function newBillModel()
    {
        return new Miscellaneous();
    }
}

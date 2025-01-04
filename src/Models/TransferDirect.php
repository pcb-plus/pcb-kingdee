<?php

namespace PcbPlus\PcbKingdee\Models;

use PcbPlus\PcbKingdee\Contracts\BillModel;
use PcbPlus\PcbKingdee\Mappers\TransferDirectMapper;

class TransferDirect extends AbstractBillModel implements BillModel
{
    const DOMAIN_NAME = 'STK_TransferDirect';
    const ENTRY_NAME = 'FBillEntry';

    /**
     * @return string
     */
    public function getDomainName()
    {
        return self::DOMAIN_NAME;
    }

    /**
     * @return string
     */
    public function getEntryName()
    {
        return self::ENTRY_NAME;
    }

    /**
     * @return string
     */
    protected function getMapperClass()
    {
        return TransferDirectMapper::class;
    }
}

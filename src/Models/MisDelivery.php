<?php

namespace PcbPlus\PcbKingdee\Models;

use PcbPlus\PcbKingdee\Contracts\BillModel;
use PcbPlus\PcbKingdee\Mappers\MisDeliveryMapper;

class MisDelivery extends AbstractBillModel implements BillModel
{
    const DOMAIN_NAME = 'STK_MisDelivery';
    const ENTRY_NAME = 'FEntity';

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
        return MisDeliveryMapper::class;
    }
}
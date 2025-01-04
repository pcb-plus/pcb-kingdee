<?php

namespace PcbPlus\PcbKingdee\Models;

use PcbPlus\PcbKingdee\Contracts\EntityModel;
use PcbPlus\PcbKingdee\Mappers\InventoryMapper;

class Inventory extends AbstractEntityModel implements EntityModel
{
    const DOMAIN_NAME = 'STK_Inventory';

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
    protected function getMapperClass()
    {
        return InventoryMapper::class;
    }
}

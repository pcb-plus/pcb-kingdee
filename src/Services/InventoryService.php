<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\Inventory;

class InventoryService extends AbstractEntityService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\Inventory
     */
    protected function newModel()
    {
        return new Inventory();
    }
}

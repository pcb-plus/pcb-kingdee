<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\Inventory;

class InventoryService extends EntityService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\Inventory
     */
    protected function newEntityModel()
    {
        return new Inventory();
    }
}

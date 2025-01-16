<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\Customer;

class CustomerService extends AbstractEntityService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\Customer
     */
    protected function newModel()
    {
        return new Customer();
    }
}

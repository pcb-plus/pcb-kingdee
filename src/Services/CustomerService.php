<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\Customer;

class CustomerService extends EntityService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\Customer
     */
    protected function newEntityModel()
    {
        return new Customer();
    }
}

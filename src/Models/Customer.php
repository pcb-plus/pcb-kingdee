<?php

namespace PcbPlus\PcbKingdee\Models;

use PcbPlus\PcbKingdee\Contracts\EntityModel;
use PcbPlus\PcbKingdee\Mappers\CustomerMapper;

class Customer extends AbstractEntityModel implements EntityModel
{
    const DOMAIN_NAME = 'BD_Customer';

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
        return CustomerMapper::class;
    }
}

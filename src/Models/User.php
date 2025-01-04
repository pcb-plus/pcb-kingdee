<?php

namespace PcbPlus\PcbKingdee\Models;

use PcbPlus\PcbKingdee\Contracts\EntityModel;
use PcbPlus\PcbKingdee\Mappers\UserMapper;

class User extends AbstractEntityModel implements EntityModel
{
    const DOMAIN_NAME = 'SEC_User';

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
        return UserMapper::class;
    }
}

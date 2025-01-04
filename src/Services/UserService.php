<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\User;

class UserService extends EntityService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\User
     */
    protected function newEntityModel()
    {
        return new User();
    }
}

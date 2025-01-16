<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Models\User;

class UserService extends AbstractEntityService
{
    /**
     * @return \PcbPlus\PcbKingdee\Models\User
     */
    protected function newModel()
    {
        return new User();
    }
}

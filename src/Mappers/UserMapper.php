<?php

namespace PcbPlus\PcbKingdee\Mappers;

class UserMapper extends AbstractEntityMapper
{
    /**
     * @var array
     */
    protected static $mappings = [
        [
            'attribute' => 'id',
            'column' => 'FUserId',
            'field' => 'FUserId',
            'comment' => '单据内码',
        ],
        [
            'attribute' => 'name',
            'column' => 'FName',
            'field' => 'FName',
            'comment' => '用户名',
        ],
        [
            'attribute' => 'forbid_status',
            'column' => 'FForbidStatus',
            'field' => 'FForbidStatus',
            'comment' => '禁用状态',
        ],
        [
            'attribute' => 'user_type',
            'column' => 'FUserType',
            'field' => 'FUserType',
            'comment' => '用户类型',
        ],
    ];

    /**
     * @return array
     */
    public static function getMappings()
    {
        return static::$mappings;
    }
}

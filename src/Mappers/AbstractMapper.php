<?php

namespace PcbPlus\PcbKingdee\Mappers;

abstract class AbstractMapper
{
    /**
     * @param array $mappings
     * @return array
     */
    public static function pluckAttributes($mappings)
    {
        return array_column($mappings, 'attribute');
    }

    /**
     * @param array $mappings
     * @return array
     */
    public static function pluckColumns($mappings)
    {
        return array_column($mappings, 'column', 'attribute');
    }

    /**
     * @param array $mappings
     * @return array
     */
    public static function pluckFields($mappings)
    {
        return array_column($mappings, 'field', 'attribute');
    }
}

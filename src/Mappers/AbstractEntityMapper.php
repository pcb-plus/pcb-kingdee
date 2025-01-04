<?php

namespace PcbPlus\PcbKingdee\Mappers;

abstract class AbstractEntityMapper extends AbstractMapper
{
    /**
     * @return array
     */
    abstract public static function getMappings();

    /**
     * @return array
     */
    public static function getAttributes()
    {
        $mappings = static::getMappings();

        return static::pluckAttributes($mappings);
    }

    /**
     * @return array
     */
    public static function getColumnMappings()
    {
        $mappings = static::getMappings();

        return static::pluckColumns($mappings);
    }

    /**
     * @return array
     */
    public static function getFieldMappings()
    {
        $mappings = static::getMappings();

        return static::pluckFields($mappings);
    }
}

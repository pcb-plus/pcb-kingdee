<?php

namespace PcbPlus\PcbKingdee\Mappers;

abstract class AbstractBillMapper extends AbstractEntityMapper
{
    /**
     * @return array
     */
    abstract public static function getBillMappings();

    /**
     * @return array
     */
    abstract public static function getEntryMappings();

    /**
     * @return array
     */
    public static function getMappings()
    {
        return array_merge(
            static::getBillMappings(),
            static::getEntryMappings()
        );
    }

    /**
     * @return array
     */
    public static function getBillAttributes()
    {
        $mappings = static::getBillMappings();

        return static::pluckAttributes($mappings);
    }

    /**
     * @return array
     */
    public static function getEntryAttributes()
    {
        $mappings = static::getEntryMappings();

        return static::pluckAttributes($mappings);
    }

    /**
     * @return array
     */
    public static function getBillColumnMappings()
    {
        $mappings = static::getBillMappings();

        return static::pluckColumns($mappings);
    }

    /**
     * @return array
     */
    public static function getEntryColumnMappings()
    {
        $mappings = static::getEntryMappings();

        return static::pluckColumns($mappings);
    }

    /**
     * @return array
     */
    public static function getBillFieldMappings()
    {
        $mappings = static::getBillMappings();

        return static::pluckFields($mappings);
    }

    /**
     * @return array
     */
    public static function getEntryFieldMappings()
    {
        $mappings = static::getEntryMappings();

        return static::pluckFields($mappings);
    }
}

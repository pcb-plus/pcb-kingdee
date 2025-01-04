<?php

namespace PcbPlus\PcbKingdee\Models;

abstract class AbstractBillModel extends AbstractEntityModel
{
    /**
     * @return string
     */
    public function getEntryIdAttributeName()
    {
        return 'entry_id';
    }

    /**
     * @return array
     */
    public function getBillAttributes()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getBillAttributes();
    }

    /**
     * @return array
     */
    public function getEntryAttributes()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getEntryAttributes();
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getAttributes();
    }

    /**
     * @return array
     */
    public function getBillColumnMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getBillColumnMappings();
    }

    /**
     * @return array
     */
    public function getEntryColumnMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getEntryColumnMappings();
    }

    /**
     * @return array
     */
    public function getColumnMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getColumnMappings();
    }

    /**
     * @return array
     */
    public function getBillFieldMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getBillFieldMappings();
    }

    /**
     * @return array
     */
    public function getEntryFieldMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getEntryFieldMappings();
    }

    /**
     * @return array
     */
    public function getFieldMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getFieldMappings();
    }
}

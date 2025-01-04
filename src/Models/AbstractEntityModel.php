<?php

namespace PcbPlus\PcbKingdee\Models;

abstract class AbstractEntityModel
{
    /**
     * @return string
     */
    public function getIdAttributeName()
    {
        return 'id';
    }

    /**
     * @return string
     */
    abstract protected function getMapperClass();

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
    public function getColumnMappings()
    {
        $mapperClass = $this->getMapperClass();
        return $mapperClass::getColumnMappings();
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

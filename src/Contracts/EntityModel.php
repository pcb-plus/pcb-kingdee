<?php

namespace PcbPlus\PcbKingdee\Contracts;

interface EntityModel extends Model
{
    /**
     * @return string
     */
    public function getIdAttributeName();

    /**
     * @return array
     */
    public function getAttributes();

    /**
     * @return array
     */
    public function getColumnMappings();

    /**
     * @return array
     */
    public function getFieldMappings();
}

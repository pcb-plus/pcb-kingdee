<?php

namespace PcbPlus\PcbKingdee\Contracts;

interface BillModel extends EntityModel
{
    /**
     * @return string
     */
    public function getEntryIdAttributeName();

    /**
     * @return string
     */
    public function getEntryName();

    /**
     * @return array
     */
    public function getBillAttributes();

    /**
     * @return array
     */
    public function getEntryAttributes();

    /**
     * @return array
     */
    public function getBillColumnMappings();

    /**
     * @return array
     */
    public function getEntryColumnMappings();

    /**
     * @return array
     */
    public function getBillFieldMappings();

    /**
     * @return array
     */
    public function getEntryFieldMappings();
}

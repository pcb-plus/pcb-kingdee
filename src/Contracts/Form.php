<?php

namespace PcbPlus\PcbKingdee\Contracts;

interface Form
{
    /**
     * @return string
     */
    public function getFormName();

    /**
     * @return array
     */
    public function getFormData();
}

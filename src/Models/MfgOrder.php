<?php

namespace PcbPlus\PcbKingdee\Models;

use PcbPlus\PcbKingdee\Contracts\BillModel;
use PcbPlus\PcbKingdee\Mappers\MfgOrderMapper;

class MfgOrder extends AbstractBillModel implements BillModel
{
    const DOMAIN_NAME = 'PRD_MO';
    const ENTRY_NAME = 'FTreeEntity';

    /**
     * @return string
     */
    public function getDomainName()
    {
        return self::DOMAIN_NAME;
    }

    /**
     * @return string
     */
    public function getEntryName()
    {
        return self::ENTRY_NAME;
    }

    /**
     * @return string
     */
    protected function getMapperClass()
    {
        return MfgOrderMapper::class;
    }
}

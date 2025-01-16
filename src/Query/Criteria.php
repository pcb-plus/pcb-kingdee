<?php

namespace PcbPlus\PcbKingdee\Query;

use PcbPlus\PcbKingdee\Concerns\HasCursorCriteria;
use PcbPlus\PcbKingdee\Concerns\HasFilterCriteria;
use PcbPlus\PcbKingdee\Concerns\HasPaginationCriteria;
use PcbPlus\PcbKingdee\Concerns\HasSelectCriteria;
use PcbPlus\PcbKingdee\Concerns\HasSortCriteria;

class Criteria
{
    use HasCursorCriteria;
    use HasFilterCriteria;
    use HasPaginationCriteria;
    use HasSelectCriteria;
    use HasSortCriteria;

    /**
     * @param static|null $criteria
     * @return static
     */
    public static function make($criteria = null)
    {
        if ($criteria instanceof static) {
            return $criteria;
        }

        return new static();
    }
}

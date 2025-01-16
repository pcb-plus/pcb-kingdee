<?php

namespace PcbPlus\PcbKingdee\Results;

use PcbPlus\PcbKingdee\Concerns\MapsQueryResult;
use PcbPlus\PcbKingdee\Contracts\Arrayable;
use PcbPlus\PcbKingdee\Contracts\Paginator;
use PcbPlus\PcbKingdee\Query\Criteria;

class BillPaginator extends AbstractPaginator implements Arrayable, Paginator
{
    use MapsQueryResult;

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @param int $total
     * @param array $results
     */
    public function __construct($model, $criteria, $total, $results)
    {
        $criteria = Criteria::make($criteria);

        $this->perPage = $criteria->getPerPage();

        $this->page = $criteria->getPage();

        $this->total = (int) $total;

        $this->items = !empty($results) ? $this->mapQueryResults($model, $results) : [];
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $results
     * @return array
     */
    protected function mapQueryResults($model, $results)
    {
        $attributes = $model->getBillAttributes();

        return array_map(function ($result) use ($attributes) {
            return $this->mapQueryResult($result, $attributes);
        }, $results);
    }
}

<?php

namespace PcbPlus\PcbKingdee\Results;

use PcbPlus\PcbKingdee\Concerns\MapsQueryResult;
use PcbPlus\PcbKingdee\Contracts\Arrayable;

class BillResult implements Arrayable
{
    use MapsQueryResult;

    const ENTRY_KEY = 'entries';

    /**
     * @var array
     */
    protected $bill = [];

    /**
     * @var array
     */
    protected $entries = [];

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $results
     */
    public function __construct($model, $results)
    {
        if (!empty($results)) {
            $results = $this->mapQueryResults($model, $results);

            $this->bill = $this->truncateBill($model, $results);

            $this->entries = $this->truncateEntries($model, $results);
        }
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $results
     * @return array
     */
    protected function mapQueryResults($model, $results)
    {
        $attributes = $model->getAttributes();

        return array_map(function ($result) use ($attributes) {
            return $this->mapQueryResult($result, $attributes);
        }, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $results
     * @return array
     */
    protected function truncateBill($model, $results)
    {
        $mappings = $model->getBillColumnMappings();

        return array_intersect_key($results[0], $mappings);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $results
     * @return array
     */
    protected function truncateEntries($model, $results)
    {
        $mappings = $model->getEntryColumnMappings();

        return array_map(function ($result) use ($mappings) {
            return array_intersect_key($result, $mappings);
        }, $results);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        if (empty($this->bill)) {
            return [];
        }

        return array_merge($this->bill, [
            self::ENTRY_KEY => $this->entries
        ]);
    }
}
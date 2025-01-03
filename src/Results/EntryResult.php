<?php

namespace PcbPlus\PcbKingdee\Results;

use PcbPlus\PcbKingdee\Concerns\MapsQueryResult;
use PcbPlus\PcbKingdee\Contracts\Arrayable;

class EntryResult implements Arrayable
{
    use MapsQueryResult;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $results
     */
    public function __construct($model, $results)
    {
        if (!empty($results)) {
            $this->data = $this->mapQueryResult($results[0], $model->getAttributes());
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}

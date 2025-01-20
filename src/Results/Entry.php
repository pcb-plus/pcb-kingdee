<?php

namespace PcbPlus\PcbKingdee\Results;

use PcbPlus\PcbKingdee\Concerns\MapsQueryResult;
use PcbPlus\PcbKingdee\Contracts\Arrayable;

class Entry implements Arrayable
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
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}

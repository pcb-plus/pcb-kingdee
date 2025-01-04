<?php

namespace PcbPlus\PcbKingdee\Results;

abstract class AbstractPaginateResult
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $lastPage;

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @return bool
     */
    public function hasMorePages()
    {
        return $this->getPage() < $this->getLastPage();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'data' => $this->getItems(),
            'per_page' => $this->getPerPage(),
            'page' => $this->getPage(),
            'total' => $this->getTotal(),
            'last_page' => $this->getLastPage(),
            'has_more_pages' => $this->hasMorePages(),
        ];
    }
}

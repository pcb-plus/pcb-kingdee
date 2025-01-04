<?php

namespace PcbPlus\PcbKingdee\Forms;

use PcbPlus\PcbKingdee\Contracts\Form;
use PcbPlus\PcbKingdee\Query\Criteria;

class EntryCountForm implements Form
{
    /**
     * @var \PcbPlus\PcbKingdee\Contracts\BillModel
     */
    protected $model;

    /**
     * @var \PcbPlus\PcbKingdee\Query\Criteria
     */
    protected $criteria;

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     */
    public function __construct($model, $criteria)
    {
        $this->model = $model;

        $entryIdAttributeName = $this->model->getEntryIdAttributeName();

        $this->criteria = Criteria::make($criteria)->addFilterGreater($entryIdAttributeName, 0);
    }

    /**
     * @return string
     */
    public function getFormName()
    {
        return $this->model->getDomainName();
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $formName = $this->model->getDomainName();

        $columnMappings = $this->model->getColumnMappings();

        return [
            'FormId' => $formName,
            'FieldKeys' => 'COUNT(1)',
            'FilterString' => $this->criteria->getFilterString($columnMappings),
            'OrderString' => '',
            'StartRow' => 0,
            'Limit' => 0,
        ];
    }
}

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

        $entryIdName = $this->model->getEntryIdName();

        $this->criteria = Criteria::make($criteria)->addFilterGreater($entryIdName, 0);
    }

    /**
     * @return string
     */
    public function getFormName()
    {
        return $this->model->getFormName();
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $formName = $this->model->getFormName();

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

<?php

namespace PcbPlus\PcbKingdee\Forms;

use PcbPlus\PcbKingdee\Contracts\Form;
use PcbPlus\PcbKingdee\Query\Criteria;

class EntityCountForm implements Form
{
    /**
     * @var \PcbPlus\PcbKingdee\Contracts\Model
     */
    protected $model;

    /**
     * @var \PcbPlus\PcbKingdee\Query\Criteria
     */
    protected $criteria;

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Model $model
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     */
    public function __construct($model, $criteria)
    {
        $this->model = $model;

        $this->criteria = Criteria::make($criteria);

        if ($this->model->isIntId()) {
            $idName = $this->model->getIdName();

            $this->criteria->addFilterGreater($idName, 0);
        }
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

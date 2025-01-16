<?php

namespace PcbPlus\PcbKingdee\Forms;

use PcbPlus\PcbKingdee\Concerns\MapsFieldData;
use PcbPlus\PcbKingdee\Contracts\Form;

class BillSaveForm implements Form
{
    use MapsFieldData;

    /**
     * @var \PcbPlus\PcbKingdee\Contracts\BillModel
     */
    protected $model;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $entryKey = 'entries';

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\BillModel $model
     * @param array $data
     */
    public function __construct($model, $data)
    {
        $this->model = $model;

        $this->data = $data;
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
        $modelData = $this->getBillModelData($this->data);

        $modelData[$this->model->getEntryName()] = array_map(function ($entryData) {
            return $this->getEntryModelData($entryData);
        }, $this->data[$this->entryKey] ?? []);

        return ['Model' => $modelData];
    }

    /**
     * @param array $billData
     * @return array
     */
    protected function getBillModelData($billData)
    {
        $fieldMappings = $this->model->getBillFieldMappings();

        return $this->mapFieldData($billData, $fieldMappings);
    }

    /**
     * @param array $entryData
     * @return array
     */
    protected function getEntryModelData($entryData)
    {
        $fieldMappings = $this->model->getEntryFieldMappings();

        return $this->mapFieldData($entryData, $fieldMappings);
    }
}

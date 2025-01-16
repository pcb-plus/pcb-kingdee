<?php

namespace PcbPlus\PcbKingdee\Forms;

use PcbPlus\PcbKingdee\Contracts\Form;

class SubmitForm implements Form
{
    /**
     * @var \PcbPlus\PcbKingdee\Contracts\Model
     */
    protected $model;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Model $model
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
        return [
            'Ids' => implode(',', $this->data['ids'] ?? []),
            'Numbers' => $this->data['numbers'] ?? [],
        ];
    }
}

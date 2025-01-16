<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Forms\AuditForm;
use PcbPlus\PcbKingdee\Forms\DeleteForm;
use PcbPlus\PcbKingdee\Forms\EntityCountForm;
use PcbPlus\PcbKingdee\Forms\EntityFindForm;
use PcbPlus\PcbKingdee\Forms\EntityPaginateForm;
use PcbPlus\PcbKingdee\Forms\EntitySearchForm;
use PcbPlus\PcbKingdee\Forms\EntitySaveForm;
use PcbPlus\PcbKingdee\Forms\SubmitForm;
use PcbPlus\PcbKingdee\Forms\UnauditForm;
use PcbPlus\PcbKingdee\Results\Entity;
use PcbPlus\PcbKingdee\Results\EntityCollection;
use PcbPlus\PcbKingdee\Results\EntityPaginator;
use PcbPlus\PcbKingdee\Results\SuccessResult;

abstract class AbstractEntityService extends AbstractService
{
    /**
     * @return \PcbPlus\PcbKingdee\Contracts\Model
     */
    abstract protected function newModel();

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntityCollection
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function get($criteria = null)
    {
        $model = $this->newModel();

        $form = new EntitySearchForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new EntityCollection($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\Entity
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function find($criteria = null)
    {
        $model = $this->newModel();

        $form = new EntityFindForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new Entity($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntityPaginator
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function paginate($criteria = null)
    {
        $model = $this->newModel();

        $total = $this->executeCount(new EntityCountForm($model, $criteria));

        $results = $total > 0 ? $this->executeQuery(new EntityPaginateForm($model, $criteria)) : [];

        return new EntityPaginator($model, $criteria, $total, $results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function draft($data)
    {
        $model = $this->newModel();

        $form = new EntitySaveForm($model, $data);

        $results = $this->executeDraft($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function save($data)
    {
        $model = $this->newModel();

        $form = new EntitySaveForm($model, $data);

        $results = $this->executeSave($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function submit($data)
    {
        $model = $this->newModel();

        $form = new SubmitForm($model, $data);

        $results = $this->executeSubmit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function audit($data)
    {
        $model = $this->newModel();

        $form = new AuditForm($model, $data);

        $results = $this->executeAudit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function unaudit($data)
    {
        $model = $this->newModel();

        $form = new UnauditForm($model, $data);

        $results = $this->executeUnaudit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function delete($data)
    {
        $model = $this->newModel();

        $form = new DeleteForm($model, $data);

        $results = $this->executeDelete($form);

        return new SuccessResult($results);
    }
}

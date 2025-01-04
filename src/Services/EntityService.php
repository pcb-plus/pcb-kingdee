<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Forms\AuditForm;
use PcbPlus\PcbKingdee\Forms\DeleteForm;
use PcbPlus\PcbKingdee\Forms\EntityCountForm;
use PcbPlus\PcbKingdee\Forms\EntityFindForm;
use PcbPlus\PcbKingdee\Forms\EntityPaginateForm;
use PcbPlus\PcbKingdee\Forms\EntityQueryForm;
use PcbPlus\PcbKingdee\Forms\EntitySaveForm;
use PcbPlus\PcbKingdee\Forms\SubmitForm;
use PcbPlus\PcbKingdee\Forms\UnauditForm;
use PcbPlus\PcbKingdee\Results\EntityPaginateResult;
use PcbPlus\PcbKingdee\Results\EntityQueryResult;
use PcbPlus\PcbKingdee\Results\EntityResult;
use PcbPlus\PcbKingdee\Results\SuccessResult;

abstract class EntityService extends Service
{
    /**
     * @return \PcbPlus\PcbKingdee\Contracts\EntityModel
     */
    abstract protected function newEntityModel();

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntityQueryResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function getEntities($criteria = null)
    {
        $model = $this->newEntityModel();

        $form = new EntityQueryForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new EntityQueryResult($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntityResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function findEntity($criteria = null)
    {
        $model = $this->newEntityModel();

        $form = new EntityFindForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new EntityResult($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntityPaginateResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function paginateEntities($criteria = null)
    {
        $model = $this->newEntityModel();

        $total = $this->executeCount(new EntityCountForm($model, $criteria));

        $results = $total > 0 ? $this->executeQuery(new EntityPaginateForm($model, $criteria)) : [];

        return new EntityPaginateResult($model, $criteria, $total, $results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function draftEntity($data)
    {
        $model = $this->newEntityModel();

        $form = new EntitySaveForm($model, $data);

        $results = $this->executeDraft($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function saveEntity($data)
    {
        $model = $this->newEntityModel();

        $form = new EntitySaveForm($model, $data);

        $results = $this->executeSave($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function submitEntity($data)
    {
        $model = $this->newEntityModel();

        $form = new SubmitForm($model, $data);

        $results = $this->executeSubmit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function auditEntity($data)
    {
        $model = $this->newEntityModel();

        $form = new AuditForm($model, $data);

        $results = $this->executeAudit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function unauditEntity($data)
    {
        $model = $this->newEntityModel();

        $form = new UnauditForm($model, $data);

        $results = $this->executeUnaudit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function deleteEntity($data)
    {
        $model = $this->newEntityModel();

        $form = new DeleteForm($model, $data);

        $results = $this->executeDelete($form);

        return new SuccessResult($results);
    }
}

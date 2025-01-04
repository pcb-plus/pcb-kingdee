<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Forms\AuditForm;
use PcbPlus\PcbKingdee\Forms\BillCountForm;
use PcbPlus\PcbKingdee\Forms\BillFindForm;
use PcbPlus\PcbKingdee\Forms\BillPaginateForm;
use PcbPlus\PcbKingdee\Forms\BillQueryForm;
use PcbPlus\PcbKingdee\Forms\BillSaveForm;
use PcbPlus\PcbKingdee\Forms\DeleteForm;
use PcbPlus\PcbKingdee\Forms\EntryCountForm;
use PcbPlus\PcbKingdee\Forms\EntryFindForm;
use PcbPlus\PcbKingdee\Forms\EntryPaginateForm;
use PcbPlus\PcbKingdee\Forms\EntryQueryForm;
use PcbPlus\PcbKingdee\Forms\PushForm;
use PcbPlus\PcbKingdee\Forms\SubmitForm;
use PcbPlus\PcbKingdee\Forms\UnauditForm;
use PcbPlus\PcbKingdee\Results\BillPaginateResult;
use PcbPlus\PcbKingdee\Results\BillQueryResult;
use PcbPlus\PcbKingdee\Results\BillResult;
use PcbPlus\PcbKingdee\Results\EntryPaginateResult;
use PcbPlus\PcbKingdee\Results\EntryQueryResult;
use PcbPlus\PcbKingdee\Results\EntryResult;
use PcbPlus\PcbKingdee\Results\SuccessResult;

abstract class BillService extends Service
{
    /**
     * @return \PcbPlus\PcbKingdee\Contracts\BillModel
     */
    abstract protected function newBillModel();

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\BillQueryResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function getBills($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new BillQueryForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new BillQueryResult($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntryQueryResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function getEntries($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new EntryQueryForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new EntryQueryResult($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\BillResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function findBill($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new BillFindForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new BillResult($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntryResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function findEntry($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new EntryFindForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new EntryResult($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\BillPaginateResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function paginateBills($criteria = null)
    {
        $model = $this->newBillModel();

        $total = $this->executeCount(new BillCountForm($model, $criteria));

        $results = $total > 0 ? $this->executeQuery(new BillPaginateForm($model, $criteria)) : [];

        return new BillPaginateResult($model, $criteria, $total, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntryPaginateResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function paginateEntries($criteria = null)
    {
        $model = $this->newBillModel();

        $total = $this->executeCount(new EntryCountForm($model, $criteria));

        $results = $total > 0 ? $this->executeQuery(new EntryPaginateForm($model, $criteria)) : [];

        return new EntryPaginateResult($model, $criteria, $total, $results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function draftBill($data)
    {
        $model = $this->newBillModel();

        $form = new BillSaveForm($model, $data);

        $results = $this->executeDraft($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function saveBill($data)
    {
        $model = $this->newBillModel();

        $form = new BillSaveForm($model, $data);

        $results = $this->executeSave($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function submitBill($data)
    {
        $model = $this->newBillModel();

        $form = new SubmitForm($model, $data);

        $results = $this->executeSubmit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function auditBill($data)
    {
        $model = $this->newBillModel();

        $form = new AuditForm($model, $data);

        $results = $this->executeAudit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function unauditBill($data)
    {
        $model = $this->newBillModel();

        $form = new UnauditForm($model, $data);

        $results = $this->executeUnaudit($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function deleteBill($data)
    {
        $model = $this->newBillModel();

        $form = new DeleteForm($model, $data);

        $results = $this->executeDelete($form);

        return new SuccessResult($results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function pushBill($data)
    {
        $model = $this->newBillModel();

        $form = new PushForm($model, $data);

        $results = $this->executePush($form);

        return new SuccessResult($results);
    }
}

<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\Forms\AuditForm;
use PcbPlus\PcbKingdee\Forms\BillCountForm;
use PcbPlus\PcbKingdee\Forms\BillFindForm;
use PcbPlus\PcbKingdee\Forms\BillPaginateForm;
use PcbPlus\PcbKingdee\Forms\BillSearchForm;
use PcbPlus\PcbKingdee\Forms\BillSaveForm;
use PcbPlus\PcbKingdee\Forms\DeleteForm;
use PcbPlus\PcbKingdee\Forms\EntryCountForm;
use PcbPlus\PcbKingdee\Forms\EntryFindForm;
use PcbPlus\PcbKingdee\Forms\EntryPaginateForm;
use PcbPlus\PcbKingdee\Forms\EntrySearchForm;
use PcbPlus\PcbKingdee\Forms\PushForm;
use PcbPlus\PcbKingdee\Forms\SubmitForm;
use PcbPlus\PcbKingdee\Forms\UnauditForm;
use PcbPlus\PcbKingdee\Results\Bill;
use PcbPlus\PcbKingdee\Results\BillCollection;
use PcbPlus\PcbKingdee\Results\BillPaginator;
use PcbPlus\PcbKingdee\Results\Entry;
use PcbPlus\PcbKingdee\Results\EntryCollection;
use PcbPlus\PcbKingdee\Results\EntryPaginator;
use PcbPlus\PcbKingdee\Results\SuccessResult;

abstract class AbstractBillService extends AbstractService
{
    /**
     * @return \PcbPlus\PcbKingdee\Contracts\BillModel
     */
    abstract protected function newBillModel();

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\BillCollection
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function get($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new BillSearchForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new BillCollection($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntryCollection
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function getEntries($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new EntrySearchForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new EntryCollection($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\Bill
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function find($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new BillFindForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new Bill($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\Entry
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function findEntry($criteria = null)
    {
        $model = $this->newBillModel();

        $form = new EntryFindForm($model, $criteria);

        $results = $this->executeQuery($form);

        return new Entry($model, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\BillPaginator
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function paginate($criteria = null)
    {
        $model = $this->newBillModel();

        $total = $this->executeCount(new BillCountForm($model, $criteria));

        $results = $total > 0 ? $this->executeQuery(new BillPaginateForm($model, $criteria)) : [];

        return new BillPaginator($model, $criteria, $total, $results);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Query\Criteria|null $criteria
     * @return \PcbPlus\PcbKingdee\Results\EntryPaginator
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function paginateEntries($criteria = null)
    {
        $model = $this->newBillModel();

        $total = $this->executeCount(new EntryCountForm($model, $criteria));

        $results = $total > 0 ? $this->executeQuery(new EntryPaginateForm($model, $criteria)) : [];

        return new EntryPaginator($model, $criteria, $total, $results);
    }

    /**
     * @param array $data
     * @return \PcbPlus\PcbKingdee\Results\SuccessResult
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function draft($data)
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
    public function save($data)
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
    public function submit($data)
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
    public function audit($data)
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
    public function unaudit($data)
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
    public function delete($data)
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
    public function push($data)
    {
        $model = $this->newBillModel();

        $form = new PushForm($model, $data);

        $results = $this->executePush($form);

        return new SuccessResult($results);
    }
}

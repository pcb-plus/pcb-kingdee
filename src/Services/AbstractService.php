<?php

namespace PcbPlus\PcbKingdee\Services;

use PcbPlus\PcbKingdee\ApiPath;
use PcbPlus\PcbKingdee\Exceptions\ApiException;

abstract class AbstractService
{
    const SESSIONID = 'kdservice-sessionid';

    /**
     * @var \PcbPlus\PcbKingdee\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $cookie = [];

    /**
     * @param \PcbPlus\PcbKingdee\Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $username
     * @return $this
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    public function startSession($username)
    {
        $this->cookie[self::SESSIONID] = $this->client->ensureSessionId($username);
        return $this;
    }

    /**
     * @return bool
     */
    public function isSessionStarted()
    {
        return isset($this->cookie[self::SESSIONID]) && !empty($this->cookie[self::SESSIONID]);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeQuery($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::QUERY,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isQuerySuccess($responseData)) {
            throw new ApiException($this->getQueryError($responseData));
        }

        return $responseData;
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return int
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeCount($form)
    {
        $responseData = $this->executeQuery($form);

        return (int) $responseData[0][0] ?? 0;
    }

    /**
     * @param array $responseData
     * @return bool
     */
    protected function isQuerySuccess($responseData)
    {
        return $responseData[0][0]['Result']['ResponseStatus']['IsSuccess'] ?? true;
    }

    /**
     * @param array $responseData
     * @return string
     */
    protected function getQueryError($responseData)
    {
        return $responseData[0][0]['Result']['ResponseStatus']['Errors'][0]['Message'] ?? 'Unknown error';
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeDraft($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::DRAFT,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeSave($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::SAVE,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeSubmit($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::SUBMIT,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeAudit($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::AUDIT,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeUnaudit($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::UNAUDIT,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executeDelete($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::DELETE,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param \PcbPlus\PcbKingdee\Contracts\Form $form
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function executePush($form)
    {
        $responseData = $this->sendFormRequest(
            ApiPath::PUSH,
            $form->getFormName(),
            $form->getFormData()
        );

        if (!$this->isActionSuccess($responseData)) {
            throw new ApiException($this->getActionError($responseData));
        }

        return $this->getActionResult($responseData);
    }

    /**
     * @param array $responseData
     * @return bool
     */
    protected function isActionSuccess($responseData)
    {
        return $responseData['Result']['ResponseStatus']['IsSuccess'] ?? false;
    }

    /**
     * @param array $responseData
     * @return string
     */
    protected function getActionError($responseData)
    {
        return $responseData['Result']['ResponseStatus']['Errors'][0]['Message'] ?? 'Unknown error in response';
    }

    /**
     * @param array $responseData
     * @return array
     */
    protected function getActionResult($responseData)
    {
        return $responseData['Result']['ResponseStatus']['SuccessEntitys'] ?? [];
    }

    /**
     * @param string $formAction
     * @param string $formName
     * @param array $formData
     * @return array
     * @throws \PcbPlus\PcbKingdee\Exceptions\ApiException
     */
    protected function sendFormRequest($formAction, $formName, $formData)
    {
        if (!$this->isSessionStarted()) {
            throw new ApiException('Session has not been started');
        }

        return $this->client->sendHttp('POST', $formAction, [
            'base_uri' => $this->client->getConfig('base_uri'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => http_build_query($this->cookie, '', ';'),
            ],
            'json' => [
                'formid' => $formName,
                'data' => $formData,
            ],
        ]);
    }
}

<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Client;

use TNTExpress\Exception\ClientException;
use TNTExpress\Exception\ExceptionManagerInterface;
use TNTExpress\Exception\InvalidPairZipcodeCityException;
use TNTExpress\Exception\MissingFieldException;
use TNTExpress\Exception\NoServiceAvailableException;
use TNTExpress\Model\DropOffPoint;
use TNTExpress\Model\City;
use TNTExpress\Model\ExpeditionRequest;

class TNTClient implements TNTClientInterface
{
    /**
     * @var \SoapClient
     */
    protected $client;

    /**
     * @var ExceptionManagerInterface
     */
    protected $manager;

    public function __construct(\SoapClient $client, ExceptionManagerInterface $manager)
    {
        $this->client  = $client;
        $this->manager = $manager;
    }

    public function checkZipcodeCityMatch($zipCode, $city)
    {
        try {
            $this->getDropOffPoints($zipCode, $city);
        } catch (ClientException $e) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getDropOffPoints($zipCode, $city = null)
    {
        if (null === $city) {
            $city = $this->getCitiesGuide($zipCode)->getName();
        }

        try {
            $dropOffPoints = $this->client->dropOffPoints(array('zipCode' => $zipCode, 'city' => $city));
        } catch (\SoapFault $e) {
            $this->manager->handle($e);
        }

        if (!isset($dropOffPoints->DropOffPoint)) {
            throw new InvalidPairZipcodeCityException($zipCode, $city);
        }

        foreach ($dropOffPoints->DropOffPoint as $point) {
            $point->init();
        }

        return $dropOffPoints->DropOffPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function getCitiesGuide($zipCode)
    {
        try {
            $cities = $this->client->CitiesGuide(array('zipCode' => $zipCode));
        } catch (\SoapFault $e) {
            $this->manager->handle($e);
        }

        if (!isset($cities->City)) {
            throw new ClientException(sprintf('Zip code "%s" does not match any city.', $zipCode));
        }

        $cities = $cities->City;

        if (!is_array($cities)) {
            $cities = array($cities);
        }

        foreach ($cities as $city) {
            $city->init();
        }

        return $cities;
    }

    /**
     * {@inheritdoc}
     */
    public function createExpedition(ExpeditionRequest $expeditionRequest)
    {
        $this->ensureParameters($expeditionRequest, array('shippingDate', 'accountNumber', 'sender', 'receiver', 'serviceCode', 'quantity', 'parcelsRequest', 'labelFormat'));

        try {
            $result = $this->client->expeditionCreation(array('parameters' => $expeditionRequest->toArray()));
        } catch (\SoapFault $e) {
            $this->manager->handle($e);
        }

        if (!isset($result->Expedition)) {
            throw new ClientException('No Expedition in results.');
        }

        $expedition = $result->Expedition;
        $expedition->init();

        return $expedition;
    }

    /**
     * {@inheritdoc}
     */
    public function getFeasibility(ExpeditionRequest $expeditionRequest, $filter = null)
    {
        $this->ensureParameters($expeditionRequest, array('shippingDate', 'accountNumber', 'sender', 'receiver'));

        try {
            $result = $this->client->feasibility(array('parameters' => $expeditionRequest->toArray()));
        } catch (\SoapFault $e) {
            $this->manager->handle($e);
        }

        if (!isset($result->Service)) {
            throw new NoServiceAvailableException();
        }

        $services = $result->Service;

        if (!is_array($services)) {
            $services = array($services);
        }

        foreach ($services as $service) {
            $service->init();
        }

        if (is_callable($filter)) {
            $services = array_values(array_filter($services, $filter));
        }

        if (0 === count($services)) {
            throw new NoServiceAvailableException();
        }

        return $services;
    }

    /**
     * @param ExpeditionRequest $expeditionRequest
     * @param array             $requiredParameters
     * @throws ClientException
     */
    protected function ensureParameters(ExpeditionRequest $expeditionRequest, array $requiredParameters)
    {
        $diff = array_diff($requiredParameters, array_keys($expeditionRequest->toArray(true)));

        if (0 < count($diff)) {
            throw new MissingFieldException(implode($diff, ', '));
        }
    }
}

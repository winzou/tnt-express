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
use TNTExpress\Model\City;
use TNTExpress\Model\DropOffPoint;
use TNTExpress\Model\Expedition;
use TNTExpress\Model\ExpeditionRequest;
use TNTExpress\Model\Service;

interface TNTClientInterface
{
    /**
     * Return the list of drop off points matching the zip code
     *
     * @param string      $zipCode
     * @param string|null $city
     *
     * @return DropOffPoint[]
     * @throws ClientException
     */
    public function getDropOffPoints($zipCode, $city);

    /**
     * Return the matching city from the given zip code
     *
     * @param string $zipCode
     *
     * @return City[]
     * @throws ClientException
     */
    public function getCitiesGuide($zipCode);

    /**
     * Return a list of possible services for an expedition
     *
     * @param ExpeditionRequest $expeditionRequest
     * @param closure|null      $filter
     *
     * @return Service[]
     * @throws ClientException
     */
    public function getFeasibility(ExpeditionRequest $expeditionRequest, $filter = null);

    /**
     * Create an expedition with the given parameters
     *
     * @param ExpeditionRequest $expeditionRequest
     *
     * @return Expedition
     * @throws ClientException
     */
    public function createExpedition(ExpeditionRequest $expeditionRequest);
}

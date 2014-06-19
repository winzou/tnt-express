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

use TNTExpress\Model\DropOffPoint;
use TNTExpress\Model\City;

class TNTClient implements TNTClientInterface
{
    protected $config = array();
    protected $client;

    public function __construct(array $config, \SoapClient $client)
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function getDropOffPoints($zipCode, $city = null)
    {
        if (null === $city) {
            $city = $this->getCitiesGuide($zipCode)->getName();
        }

        $dropOffPoints = $this->client->dropOffPoints(array('zipCode' => $zipCode, 'city' => $city));

        if (!isset($dropOffPoints->DropOffPoint)) {
            throw new ClientException(sprintf('Zip code "%s" does not match city "%s".', $zipCode, $city));
        }

        return $dropOffPoints->DropOffPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function getCitiesGuide($zipCode)
    {
        $cities = $this->client->CitiesGuide(array('zipCode' => $zipCode));

        if (!isset($cities->City)) {
            throw new ClientException(sprintf('Zip code "%s" does not match any city.', $zipCode));
        }

        return $cities->City;
    }
}

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
     * @return City
     * @throws ClientException
     */
    public function getCitiesGuide($zipCode);
}

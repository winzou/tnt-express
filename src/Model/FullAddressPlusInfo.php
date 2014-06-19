<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Model;

class FullAddressPlusInfo extends FullAddress
{
    /**
     * @var string
     */
    protected $geolocalisationUrl;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var array
     */
    protected $openingHours;

    /**
     * @return string|null
     */
    public function getGeolocalisationUrl()
    {
        return $this->geolocalisationUrl;
    }

    /**
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getOpeningHours()
    {
        return json_decode(json_encode($this->openingHours), true);
    }
}

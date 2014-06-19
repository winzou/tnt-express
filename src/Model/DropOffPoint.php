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

class DropOffPoint extends FullAddressPlusInfo
{
    protected $latitude;
    protected $longitude;
    protected $xETTCode;

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getXETTCode()
    {
        return $this->xETTCode;
    }
}

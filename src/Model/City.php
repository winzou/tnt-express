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

class City
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}

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

class FullAddress extends Address
{
    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $department;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }
}

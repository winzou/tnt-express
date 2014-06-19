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

class Address
{
    /**
     * @var string
     */
    protected $address1;
    
    /**
     * @var string
     */
    protected $address2;
    
    /**
     * @var string
     */
    protected $city;
    
    /**
     * @var string
     */
    protected $zipCode;
    
    /**
     * @return string|null
     */
    public function getAddress1()
    {
        return $this->address1;
    }
    
    /**
     * @return string|null
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}

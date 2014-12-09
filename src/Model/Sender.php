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

class Sender extends Address
{
    /**
     * Company name
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $contactFirstName;

    /**
     * @var string
     */
    protected $contactLastName;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $faxNumber;

    /**
     * @var string
     */
    protected $type = 'ENTERPRISE';

    /**
     * Only if type == DEPOT, then the PEX code
     * @var string
     */
    protected $typeId;

    static public function getTypes()
    {
        return array('ENTERPRISE', 'DEPOT');
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Sender
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return Sender
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactFirstName()
    {
        return $this->contactFirstName;
    }

    /**
     * @return Sender
     */
    public function setContactFirstName($contactFirstName)
    {
        $this->contactFirstName = $contactFirstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactLastName()
    {
        return $this->contactLastName;
    }

    /**
     * @return Sender
     */
    public function setContactLastName($contactLastName)
    {
        $this->contactLastName = $contactLastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return Sender
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @return Sender
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Sender
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @return Sender
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }
}

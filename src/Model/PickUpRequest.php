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

class PickUpRequest
{
    /**
     * Mandatory
     * @var string Format HH:MM
     */
    protected $closingTime;
    
    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * First name of the contact
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $instructions;

    /**
     * Last name of the contact
     * @var string
     */
    protected $lastName;

    /**
     * Type of media for notifications, only EMAIL accepted
     * @var string
     */
    protected $media = 'EMAIL';

    /**
     * String version for boolean: do we notify or not
     * @var string
     */
    protected $notifySuccess;

    /**
     * Phone number of the contact - mandatory
     * @var string
     */
    protected $phoneNumber;

    /**
     * Service of the contact
     * @var string
     */
    protected $service;

    public function __construct($phoneNumber = null, $emailAddress = null, $closingTime = null)
    {
        $this->setPhoneNumber($phoneNumber);
        $this->setEmailAddress($emailAddress);
        $this->setClosingTime($closingTime);
    }

    /**
     * @return string|null
     */
    public function getClosingTime()
    {
        return $this->closingTime;
    }

    /**
     * @return PickUpRequest
     */
    public function setClosingTime($closingTime)
    {
        $this->closingTime = $closingTime;
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
     * @return PickUpRequest
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return PickUpRequest
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @return PickUpRequest
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return PickUpRequest
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @return string|null
     */
    public function getNotifySuccess()
    {
        return $this->notifySuccess;
    }

    /**
     * @return PickUpRequest
     */
    public function setNotifySuccess($notifySuccess)
    {
        $this->notifySuccess = $notifySuccess;
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
     * @return PickUpRequest
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @return PickUpRequest
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }
}

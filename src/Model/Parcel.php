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

class Parcel
{
    /**
     * @var string
     */
    protected $consignmentNumber;

    /**
     * @var string
     */
    protected $accountNumber;
    
    /**
     * @var string
     */
    protected $reference;
    
    /**
     * @var Sender
     */
    protected $sender;
    
    /**
     * @var Receiver
     */
    protected $receiver;

    /**
     * @var DropOffPoint
     */
    protected $dropOffPoint;

    /**
     * @var string
     */
    protected $service;

    /**
     * @var string
     */
    protected $weight;

    /**
     * @var Events
     */
    protected $events;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $longStatus;

    /**
     * @var string
     */
    protected $shortStatus;

    /**
     * @var string
     */
    protected $primaryPODUrl;

    /**
     * @var string
     */
    protected $secondaryPODUrl;

    public function init()
    {
        $this->events->init();
    }

    /**
     * @return string
     */
    public function getConsignmentNumber()
    {
        return $this->consignmentNumber;
    }

    /**
     * @return $this
     */
    public function setConsignmentNumber($consignmentNumber)
    {
        $this->consignmentNumber = $consignmentNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @return $this
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @return $this
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @return $this
     */
    public function setReceiver(Receiver $receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return string
     */
    public function getDropOffPoint()
    {
        return $this->dropOffPoint;
    }

    /**
     * @return $this
     */
    public function setDropOffPoint($dropOffPoint)
    {
        $this->dropOffPoint = $dropOffPoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return $this
     */
    public function setEvents($events)
    {
        $this->events = $events;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortStatus()
    {
        return $this->shortStatus;
    }

    /**
     * @return $this
     */
    public function setShortStatus($shortStatus)
    {
        $this->shortStatus = $shortStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongStatus()
    {
        return $this->longStatus;
    }

    /**
     * @return $this
     */
    public function setLongStatus($longStatus)
    {
        $this->longStatus = $longStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryPODUrl()
    {
        return $this->primaryPODUrl;
    }

    /**
     * @return $this
     */
    public function setPrimaryPODUrl($primaryPODUrl)
    {
        $this->primaryPODUrl = $primaryPODUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecondaryPODUrl()
    {
        return $this->secondaryPODUrl;
    }

    /**
     * @return $this
     */
    public function setSecondaryPODUrl($secondaryPODUrl)
    {
        $this->secondaryPODUrl = $secondaryPODUrl;
        return $this;
    }
}

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

class ExpeditionRequest
{
    /**
     * @var PickUpRequest
     */
    protected $pickUpRequest;

    /**
     * @var \Datetime
     */
    protected $shippingDate;

    /**
     * @var int
     */
    protected $accountNumber;

    /**
     * @var Sender
     */
    protected $sender;

    /**
     * @var Receiver
     */
    protected $receiver;

    /**
     * @var string
     */
    protected $serviceCode;

    /**
     * @var int
     */
    protected $quantity = 1;

    /**
     * @var ParcelRequest[]
     */
    protected $parcelsRequest;

    /**
     * @var bool
     */
    protected $saturdayDelivery;

    /**
     * @var array
     */
    protected $paybackInfo;

    /**
     * @var string
     */
    protected $labelFormat = 'STDA4';

    public function toArray($filterNulls = false)
    {
        $ro = new \ReflectionObject($this);
        $array = array();

        foreach ($ro->getProperties() as $property) {
            $value = call_user_func(array($this, 'get'.ucfirst($property->getName())));

            if ($value instanceof \Datetime) {
                $array[$property->getName()] = $value->format('Y-m-d');
            } elseif (!$filterNulls || null !== $value) {
                $array[$property->getName()] = $value;
            }
        }

        return $array;
    }

    public function setShippingDate(\Datetime $shippingDate)
    {
        $this->shippingDate = $shippingDate;

        return $this;
    }

    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    public function setPickupRequest($pickupRequest = null)
    {
        $this->pickUpRequest = $pickupRequest;

        return $this;
    }

    public function getPickupRequest()
    {
        return $this->pickUpRequest;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getReceiver()
    {
        return $this->receiver;
    }

    public function setServiceCode($serviceCode)
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    public function getServiceCode()
    {
        return $this->serviceCode;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setParcelsRequest($parcelsRequest)
    {
        $this->parcelsRequest = $parcelsRequest;

        return $this;
    }

    public function getParcelsRequest()
    {
        return $this->parcelsRequest;
    }

    public function setSaturdayDelivery($saturdayDelivery)
    {
        $this->saturdayDelivery = $saturdayDelivery;

        return $this;
    }

    public function getSaturdayDelivery()
    {
        return $this->saturdayDelivery;
    }

    public function setPaybackInfo($paybackInfo)
    {
        $this->paybackInfo = $paybackInfo;

        return $this;
    }

    public function getPaybackInfo()
    {
        return $this->paybackInfo;
    }

    public function setLabelFormat($labelFormat)
    {
        $this->labelFormat = $labelFormat;

        return $this;
    }

    public function getLabelFormat()
    {
        return $this->labelFormat;
    }
}

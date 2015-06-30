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

class Events
{
    static public $sequence = array(
        'requestDate',
        'processDate',
        'arrivalDate',
        'deliveryDepartureDate',
        'deliveryDate',
    );

    /**
     * @var \Datetime
     */
    protected $requestDate;

    /**
     * @var \Datetime
     */
    protected $processDate;
    
    /**
     * @var string
     */
    protected $processCenter;
    
    /**
     * @var string
     */
    protected $processCenterPEX;
    
    /**
     * @var \Datetime
     */
    protected $arrivalDate;

    /**
     * @var string
     */
    protected $arrivalCenter;

    /**
     * @var string
     */
    protected $arrivalCenterPEX;

    /**
     * @var \Datetime
     */
    protected $deliveryDepartureDate;

    /**
     * @var string
     */
    protected $deliveryDepartureCenter;

    /**
     * @var string
     */
    protected $deliveryDepartureCenterPEX;

    /**
     * @var \Datetime
     */
    protected $deliveryDate;

    public function init()
    {
        foreach (array('requestDate', 'processDate', 'arrivalDate', 'deliveryDepartureDate', 'deliveryDate') as $attr) {
            $this->$attr = $this->$attr ? new \Datetime($this->$attr) : null;
        }
    }

    /**
     * Return the last not null event
     * 
     * @return string
     */
    public function getLastEvent()
    {
        if (null === $this->{self::$sequence[0]}) {
            return self::$sequence[0];
        }

        foreach (self::$sequence as $i => $event) {
            if (null === $this->$event) {
                return self::$sequence[$i-1];
            }
        }

        return self::$sequence[count(self::$sequence)-1];
    }

    /**
     * @param  string $event
     * @return bool
     */
    public function isEventDone($event)
    {
        return (isset($this->$event) && null !== $this->$event);
    }

    /**
     * @return string
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return $this
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProcessDate()
    {
        return $this->processDate;
    }

    /**
     * @return $this
     */
    public function setProcessDate($processDate)
    {
        $this->processDate = $processDate;
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getProcessCenter()
    {
        return $this->processCenter;
    }

    /**
     * @return $this
     */
    public function setProcessCenter($processCenter)
    {
        $this->processCenter = $processCenter;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProcessCenterPEX()
    {
        return $this->processCenterPEX;
    }

    /**
     * @return $this
     */
    public function setProcessCenterPEX(Sender $processCenterPEX)
    {
        $this->processCenterPEX = $processCenterPEX;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }

    /**
     * @return $this
     */
    public function setArrivalDate(Receiver $arrivalDate)
    {
        $this->arrivalDate = $arrivalDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getArrivalCenter()
    {
        return $this->arrivalCenter;
    }

    /**
     * @return $this
     */
    public function setArrivalCenter($arrivalCenter)
    {
        $this->arrivalCenter = $arrivalCenter;
        return $this;
    }

    /**
     * @return string
     */
    public function getArrivalCenterPEX()
    {
        return $this->arrivalCenterPEX;
    }

    /**
     * @return $this
     */
    public function setArrivalCenterPEX($arrivalCenterPEX)
    {
        $this->arrivalCenterPEX = $arrivalCenterPEX;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDepartureDate()
    {
        return $this->deliveryDepartureDate;
    }

    /**
     * @return $this
     */
    public function setDeliveryDepartureDate($deliveryDepartureDate)
    {
        $this->deliveryDepartureDate = $deliveryDepartureDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDepartureCenter()
    {
        return $this->deliveryDepartureCenter;
    }

    /**
     * @return $this
     */
    public function setDeliveryDepartureCenter($deliveryDepartureCenter)
    {
        $this->deliveryDepartureCenter = $deliveryDepartureCenter;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDepartureCenterPEX()
    {
        return $this->deliveryDepartureCenterPEX;
    }

    /**
     * @return $this
     */
    public function setDeliveryDepartureCenterPEX($deliveryDepartureCenterPEX)
    {
        $this->deliveryDepartureCenterPEX = $deliveryDepartureCenterPEX;
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
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @return $this
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
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

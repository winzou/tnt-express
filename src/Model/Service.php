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

class Service
{
    /**
     * @var string
     */
    protected $dueDate;

    /**
     * @var string
     */
    protected $serviceCode;

    /**
     * @var string
     */
    protected $serviceLabel;

    /**
     * @var bool
     */
    protected $saturdayDelivery;

    /**
     * @var bool
     */
    protected $priorityGuarantee;

    /**
     * @var bool
     */
    protected $insurance;

    /**
     * @var bool
     */
    protected $afternoonDelivery;

    public function init()
    {
        foreach (array('saturdayDelivery', 'priorityGuarantee', 'insurance', 'afternoonDelivery') as $key) {
            $this->$key = (bool) $key;
        }
    }

    /**
     * @return string|null
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @return $this
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getServiceCode($nbChar = null)
    {
        if (null !== $nbChar) {
            return substr($this->serviceCode, 0, $nbChar);
        }

        return $this->serviceCode;
    }

    /**
     * @return $this
     */
    public function setServiceCode($serviceCode)
    {
        $this->serviceCode = $serviceCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getServiceLabel()
    {
        return $this->serviceLabel;
    }

    /**
     * @return $this
     */
    public function setServiceLabel($serviceLabel)
    {
        $this->serviceLabel = $serviceLabel;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSaturdayDelivery()
    {
        return $this->saturdayDelivery;
    }

    /**
     * @return $this
     */
    public function setSaturdayDelivery($saturdayDelivery)
    {
        $this->saturdayDelivery = (bool) $saturdayDelivery;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isPriorityGuarantee()
    {
        return $this->priorityGuarantee;
    }

    /**
     * @return $this
     */
    public function setPriorityGuarantee($priorityGuarantee)
    {
        $this->priorityGuarantee = (bool) $priorityGuarantee;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isInsurance()
    {
        return $this->insurance;
    }

    /**
     * @return $this
     */
    public function setInsurance($insurance)
    {
        $this->insurance = (bool) $insurance;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isAfternoonDelivery()
    {
        return $this->afternoonDelivery;
    }

    /**
     * @return $this
     */
    public function setAfternoonDelivery($afternoonDelivery)
    {
        $this->afternoonDelivery = (bool) $afternoonDelivery;
        return $this;
    }
}

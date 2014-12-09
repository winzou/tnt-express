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

class ParcelRequest
{
    /**
     * @var string
     */
    public $comment;

    /**
     * @var string
     */
    public $customerReference;

    /**
     * @var string
     */
    public $insuranceAmount;

    /**
     * @var string
     */
    public $priorityGuarantee;

    /**
     * @var string
     */
    public $sequenceNumber;

    /**
     * @var string
     */
    public $weight;

    static public function getPriorityGuarantees()
    {
        return array('', 'PTY', 'GUE');
    }

    /**
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return ParcelRequest
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string|null
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * @return ParcelRequest
     */
    public function setCustomerReference($customerReference)
    {
        $this->customerReference = $customerReference;
    }

    /**
     * @return string|null
     */
    public function getInsuranceAmount()
    {
        return $this->insuranceAmount;
    }

    /**
     * @return ParcelRequest
     */
    public function setInsuranceAmount($insuranceAmount)
    {
        $this->insuranceAmount = $insuranceAmount;
    }

    /**
     * @return TNTEnumOption|null
     */
    public function getPriorityGuarantee()
    {
        return $this->priorityGuarantee;
    }

    /**
     * @return ParcelRequest
     */
    public function setPriorityGuarantee($priorityGuarantee)
    {
        $this->priorityGuarantee = $priorityGuarantee;
    }

    /**
     * @return string|null
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @return ParcelRequest
     */
    public function setSequenceNumber($sequenceNumber)
    {
        $this->sequenceNumber = $sequenceNumber;
    }

    /**
     * @return string|null
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return ParcelRequest
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}

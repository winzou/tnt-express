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

use Doctrine\Common\Collections\ArrayCollection;

class Expedition
{
    /**
     * @var ArrayCollection
     */
    protected $parcelResponses;

    /**
     * @var string
     */
    protected $PDFLabels;

    /**
     * @var string
     */
    protected $pickUpNumber;

    public function __construct()
    {
        $this->parcelResponses = new ArrayCollection();
    }

    public function init()
    {
        if (!$this->parcelResponses instanceof ArrayCollection) {
            $this->setParcelResponses(new ArrayCollection(
                is_array($this->parcelResponses) ? $this->parcelResponses : array($this->parcelResponses)
            ));
        }

        foreach ($this->parcelResponses as $parcel) {
            $parcel->init();
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getParcelResponses()
    {
        return $this->parcelResponses;
    }

    /**
     * @param int             $index
     * @return ParcelResponse
     */
    public function getParcelResponse($index = 0)
    {
        return $this->parcelResponses[$index];
    }

    /**
     * @return $this
     */
    public function addParcelResponse(ParcelResponse $parcelResponse)
    {
        $this->parcelResponses[] = $parcelResponse;

        return $this;
    }

    /**
     * @return $this
     */
    public function removeParcelResponse(ParcelResponse $parcelResponse)
    {
        if ($this->parcelResponses->contains($parcelResponse)) {
            $this->parcelResponses->removeElement($parcelResponse);
        }

        return $this;
    }

    /**
     * @param ArrayCollection $parcelResponses
     * @return $this
     */
    public function setParcelResponses(ArrayCollection $parcelResponses)
    {
        $this->parcelResponses = new ArrayCollection();

        foreach ($parcelResponses as $parcelResponse) {
            $this->addParcelResponse($parcelResponse);
        }

        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPDFLabels()
    {
        return is_resource($this->PDFLabels) ? stream_get_contents($this->PDFLabels) : $this->PDFLabels;
    }

    /**
     * @return $this
     */
    public function setPDFLabels($PDFLabels)
    {
        $this->PDFLabels = $PDFLabels;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPickUpNumber()
    {
        return $this->pickUpNumber;
    }

    /**
     * @return $this
     */
    public function setPickUpNumber($pickUpNumber)
    {
        $this->pickUpNumber = $pickUpNumber;
        return $this;
    }
}

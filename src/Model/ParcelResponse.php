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

class ParcelResponse
{
    /**
     * @var string
     */
    protected $sequenceNumber;

    /**
     * @var string
     */
    protected $parcelNumber;

    /**
     * @var string
     */
    protected $trackingURL;

    /**
     * @var string
     */
    protected $stickerNumber;

    public function init()
    {
    }

    /**
     * @return string
     */
    public function getParcelNumber()
    {
        return $this->parcelNumber;
    }

    /**
     * @return ParcelResponse
     */
    public function setParcelNumber($parcelNumber)
    {
        $this->parcelNumber = $parcelNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingURL()
    {
        return $this->trackingURL;
    }

    /**
     * @return ParcelResponse
     */
    public function setTrackingURL($trackingURL)
    {
        $this->trackingURL = $trackingURL;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStickerNumber()
    {
        return $this->stickerNumber;
    }

    /**
     * @return ParcelResponse
     */
    public function setStickerNumber($stickerNumber)
    {
        $this->stickerNumber = $stickerNumber;
        return $this;
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
        return $this;
    }
}

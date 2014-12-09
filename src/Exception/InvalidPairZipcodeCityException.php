<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Exception;

class InvalidPairZipcodeCityException extends ClientException
{
    const MESSAGE = "(zip code / city) pair '%s / %s' doesn't exist.";

    public function __construct($zipCode, $city)
    {
        parent::__construct(sprintf(self::MESSAGE, $zipCode, $city));
    }
}

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

class InvalidZipcodeException extends ClientException
{
    const MESSAGE = "The field '%s' is not a valid french zip code.";

    public function __construct($zipCode)
    {
        parent::__construct(sprintf(self::MESSAGE, $zipCode));
    }
}

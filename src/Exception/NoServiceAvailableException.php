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

class NoServiceAvailableException extends ClientException
{
    public function __construct()
    {
        parent::__construct('There is no service available for this expedition.');
    }
}

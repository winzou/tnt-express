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

interface ExceptionManagerInterface
{
    /**
     * Add an exception class
     *
     * @param  string $class
     */
    public function addClass($class);

    /**
     * Get registered exception classes
     *
     * @return string[]
     */
    public function getClasses();

    /**
     * Try to transform a SoapFault exception to a custom one, or throw it again
     *
     * @param \SoapFault $e
     *
     * @throws \SoapFault
     * @throws ClientException
     */
    public function handle(\SoapFault $e);
}

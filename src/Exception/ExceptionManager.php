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

class ExceptionManager implements ExceptionManagerInterface
{
    protected $classes = array();

    protected $defaultClasses = array(
        'InvalidPairZipcodeCityException',
        'InvalidZipcodeException',
        'MissingFieldException'
    );

    public function __construct($default = true)
    {
        if ($default) {
            $this->addDefaultClasses();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addClass($class)
    {
        $this->classes[] = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function getClasses()
    {
        return $this->classes;
    }

    public function addDefaultClasses()
    {
        foreach ($this->defaultClasses as $class) {
            $this->addClass('TNTExpress\\Exception\\'.$class);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function handle(\SoapFault $e)
    {
        $message = trim($e->getMessage());

        foreach ($this->classes as $class) {
            $results = array();
            if (preg_match('`'.str_replace('%s', '(.*?)', $class::MESSAGE).'`is', $message, $results)) {
                $rc = new \ReflectionClass($class);
                unset($results[0]);
                throw $rc->newInstanceArgs($results);
            }
        }

        throw new ClientException($message, $e->getCode(), $e);
    }
}

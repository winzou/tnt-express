<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use TNTExpress\Client\TNTClient;
use TNTExpress\Client\SoapClientBuilder;

require __DIR__ . '/../vendor/autoload.php';

$builder = new SoapClientBuilder('login', 'password');
$soapClient = $builder->createClient(true);

$TNTClient = new TNTClient(array(), $soapClient);

try {
    $city = $TNTClient->getCitiesGuide('76130');

    var_dump($city);
} catch (\SoapFault $e) {
    var_dump(
        $e->getMessage(),
        $soapClient->__getLastRequest(),
        $soapClient->__getLastResponse()
    );
}

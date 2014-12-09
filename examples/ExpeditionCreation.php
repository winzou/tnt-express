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
use TNTExpress\Exception\ClientException;
use TNTExpress\Exception\ExceptionManager;
use TNTExpress\Model\Sender;
use TNTExpress\Model\Receiver;
use TNTExpress\Model\ParcelRequest;
use TNTExpress\Model\PickUpRequest;

require __DIR__ . '/../vendor/autoload.php';

$builder = new SoapClientBuilder('login', 'password');
$soapClient = $builder->createClient(true);

$TNTClient = new TNTClient($soapClient, new ExceptionManager());

$sender = new Sender();
$sender->setName('Caissin');
$sender->setAddress1('73 Boulevard de Grenelle');
$sender->setZipCode('75015');
$sender->setCity('Paris');

$receiver = new Receiver();
$receiver->setAddress1('9 rue Port du Temple');
$receiver->setZipCode('69002');
$receiver->setCity('Lyon');
$receiver->setContactFirstName('Alex');
$receiver->setContactLastName('Durand');
$receiver->setEmailAddress('alex@durand.fr');
$receiver->setPhoneNumber('0235760912');
$receiver->setType('INDIVIDUAL');
//$receiver->setName('Fleuriste');
//$receiver->setTypeId('K2023');

$parcelRequest1 = new ParcelRequest();
$parcelRequest1->setSequenceNumber(1);
$parcelRequest1->setWeight('1.5');

$parcelRequest2 = new ParcelRequest();
$parcelRequest2->setSequenceNumber(2);
$parcelRequest2->setWeight('3');

$pickupRequest = new PickUpRequest('0633760912', 'logistics@my-company.com', '18:00');

$expeditionRequest = new \TNTExpress\Model\ExpeditionRequest();
$expeditionRequest->setShippingDate(new \Datetime('2015-01-12'));
$expeditionRequest->setAccountNumber('06324676');
$expeditionRequest->setSender($sender);
$expeditionRequest->setReceiver($receiver);

foreach (array($sender, $receiver) as $address) {
    if (!$TNTClient->checkZipcodeCityMatch($address->getZipCode(), $address->getCity())) {
        exit(sprintf('Error: Zip code "%s" does not match city "%s".', $address->getZipCode(), $address->getCity()));
    }
}

$filter = function($service) {
    if ($service->getServiceCode(1) != 'J') { // We keep only the Express service
        return false;
    }
    if ($service->isSaturdayDelivery() != true) { // And with a Saturday delivery
        return false;
    }
    return true;
};

try {
    $feasibility = $TNTClient->getFeasibility($expeditionRequest, $filter);

    var_dump($feasibility);
} catch (\SoapFault $e) {
    var_dump($e->getMessage());
}

$expeditionRequest->setQuantity(2);
$expeditionRequest->setParcelsRequest(array($parcelRequest1, $parcelRequest2));
$expeditionRequest->setServiceCode($feasibility[0]->getServiceCode());
$expeditionRequest->setPickupRequest($pickupRequest);

try {
    $result = $TNTClient->createExpedition($expeditionRequest);

    file_put_contents('test.pdf', $result->getPDFLabels());
    var_dump($result);
} catch (ClientException $e) {
    var_dump($e->getMessage());
}

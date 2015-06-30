<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Client;

class SoapClientBuilder
{
    const TEST_LOGIN    = 'webservices@tnt.fr';
    const TEST_PASSWORD = 'test';

    const WSDL = 'http://www.tnt.fr/service/?wsdl';

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $wsdl;

    /**
     * @var array
     */
    protected $classmap = array(
        'Address'             => '\TNTExpress\Model\Address',
        'city'                => '\TNTExpress\Model\City',
        'dropOffPoint'        => '\TNTExpress\Model\DropOffPoint',
        'fullAddress'         => '\TNTExpress\Model\FullAddress',
        'fullAddressPlusInfo' => '\TNTExpress\Model\FullAddressPlusInfo',
        'parcelRequest'       => '\TNTExpress\Model\ParcelRequest',
        'receiver'            => '\TNTExpress\Model\Receiver',
        'sender'              => '\TNTExpress\Model\Sender',
        'pickUpRequest'       => '\TNTExpress\Model\PickUpRequest',
        'expeditionResponse'  => '\TNTExpress\Model\Expedition',
        'service'             => '\TNTExpress\Model\Service',
        'parcelResponse'      => '\TNTExpress\Model\ParcelResponse',
        'parcel'              => '\TNTExpress\Model\Parcel',
        'event'               => '\TNTExpress\Model\Events',
        'expeditionCreationParameter' => '\TNTExpress\Model\ExpeditionRequest',
    );

    public function __construct($login = null, $password = null, array $classmap = null, $wsdl = null)
    {
        $this->login    = $login;
        $this->password = $password;

        if (null !== $classmap) {
            $this->classmap = array_merge($this->classmap, $classmap);
        }

        $this->wsdl = $wsdl ?: self::WSDL;
    }

    /**
     * Return a new instance of SoapClient
     *
     * @param bool $sandBox
     *
     * @return \SoapClient
     */
    public function createClient($sandBox = false)
    {
        $client = new \SoapClient($this->wsdl, array(
            'soap_version' => SOAP_1_1,
            'classmap'     => $this->classmap
        ));

        $login    = $sandBox ? self::TEST_LOGIN    : $this->login;
        $password = $sandBox ? self::TEST_PASSWORD : $this->password;

        $client->__setSOAPHeaders($this->getSecurityHeader($login, $password));

        return $client;
    }

    /**
     * Return an instance of SoapHeader for WS Security
     *
     * @param string $login
     * @param string $password
     *
     * @return \SoapHeader
     */
    public function getSecurityHeader($login, $password)
    {
        $authHeader = sprintf(
            $this->getSecurityHeaderTemplate(),
            htmlspecialchars($login),
            htmlspecialchars($password)
        );

        return new \SoapHeader(
            'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
            'Security',
            new \SoapVar($authHeader, XSD_ANYXML)
        );
    }

    /**
     * Return template for WS Security header
     *
     * @return string
     */
    protected function getSecurityHeaderTemplate()
    {
        return
            '<wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
              <wsse:UsernameToken>
                <wsse:Username>%s</wsse:Username>
                <wsse:Password>%s</wsse:Password>
             </wsse:UsernameToken>
            </wsse:Security>'
        ;
    }
}

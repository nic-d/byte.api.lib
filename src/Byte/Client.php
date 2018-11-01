<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 01/11/2018
 * Time: 16:26
 */

namespace Nybbl\Byte;

use Nybbl\Byte\Api;
use Nybbl\Byte\Api\AbstractApi;

/**
 * Class Client
 * @package Nybbl\Byte
 */
class Client extends AbstractApi
{
    /**
     * Client constructor.
     * @param string $accessToken
     * @throws \ErrorException
     */
    public function __construct(string $accessToken = '')
    {
        parent::__construct($accessToken);
    }

    /**
     * @param string $name
     * @return Api\Install|Api\License|Api\Product|Api\Version
     * @throws \ErrorException
     * @throws \Exception
     */
    public function api(string $name)
    {
        switch ($name) {
            case 'install':
                return new Api\Install($this->getAccessToken());
                break;

            case 'license':
                return new Api\License($this->getAccessToken());
                break;

            case 'product':
                return new Api\Product($this->getAccessToken());
                break;

            case 'version':
                return new Api\Version($this->getAccessToken());
                break;

            default:
                throw new \Exception('Unknown class! You tried to call: ' . $name);
        }
    }

    /**
     * Proxies $class->product() to $class->api('product')
     *
     * @param string $name
     * @param $args
     * @return Api\Install|Api\License|Api\Product|Api\Version
     * @throws \ErrorException
     */
    public function __call(string $name, $args)
    {
        return $this->api($name);
    }
}
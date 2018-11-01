<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 01/11/2018
 * Time: 16:42
 */

namespace Nybbl\Byte\Api;

/**
 * Class Install
 * @package Nybbl\Byte\Api
 */
class Install extends AbstractApi
{
    /**
     * @param string $license
     * @param string $product
     * @param string $ipAddress
     * @param string $domain
     * @param string|null $requestPath
     * @param string|null $serverName
     * @param array $metaData
     * @return mixed
     */
    public function install(
        string $license,
        string $product,
        string $ipAddress,
        string $domain,
        $requestPath = null,
        $serverName = null,
        array $metaData = []
    )
    {
        return $this->post('/install', [
            'license'     => $license,
            'product'     => $product,
            'ipAddress'   => $ipAddress,
            'domain'      => $domain,
            'requestPath' => $requestPath,
            'serverName'  => $serverName,
            'metaData'    => $metaData,
        ]);
    }
}
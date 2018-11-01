<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 01/11/2018
 * Time: 16:42
 */

namespace Nybbl\Byte\Api;

/**
 * Class License
 * @package Nybbl\Byte\Api
 */
class License extends AbstractApi
{
    /**
     * @param string $license
     * @return mixed
     */
    public function verify(string $license)
    {
        return $this->post('/license', [
            'license' => $license,
        ]);
    }
}
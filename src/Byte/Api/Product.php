<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 01/11/2018
 * Time: 16:42
 */

namespace Nybbl\Byte\Api;

/**
 * Class Product
 * @package Nybbl\Byte\Api
 */
class Product extends AbstractApi
{
    /**
     * @return mixed
     */
    public function products()
    {
        return $this->get('/product');
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function product(string $id)
    {
        return $this->get(sprintf('/product/%s', $id));
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function changelog(string $id)
    {
        return $this->get(sprintf('/product/%s/changelog', $id));
    }
}
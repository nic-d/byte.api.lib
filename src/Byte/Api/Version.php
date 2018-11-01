<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 01/11/2018
 * Time: 16:55
 */

namespace Nybbl\Byte\Api;

/**
 * Class Version
 * @package Nybbl\Byte\Api
 */
class Version extends AbstractApi
{
    /**
     * @param string $id
     * @return mixed
     */
    public function latest(string $id)
    {
        return $this->get(sprintf('products/%s/version/latest', $id));
    }

    /**
     * @param string $id
     * @param string $versionId
     * @return mixed
     */
    public function version(string $id, string $versionId)
    {
        return $this->get(sprintf('products/%s/versions/%s', $id, $versionId));
    }

    /**
     * @param string $id
     * @param string $versionId
     * @param string $compareId
     * @return mixed
     */
    public function compare(string $id, string $versionId, string $compareId)
    {
        return $this->get(sprintf(
            'products/%s/versions/%s/compare/%s',
            $id,
            $versionId,
            $compareId
        ));
    }
}
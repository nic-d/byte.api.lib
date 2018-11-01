<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 01/11/2018
 * Time: 16:26
 */

namespace Nybbl\Byte\Api;

use Curl\Curl;

/**
 * Class AbstractApi
 * @package Nybbl\Byte\Api
 */
abstract class AbstractApi
{
    /** @var string $apiUrl */
    private $apiUrl = 'https://byte.nybbl.io/api/v1';

    /** @var Curl $curlClient */
    private $curlClient;

    /** @var string $accessToken */
    private $accessToken;

    /**
     * AbstractApi constructor.
     * @param string $accessToken
     * @throws \ErrorException
     */
    public function __construct($accessToken = '')
    {
        $this->buildCurlClient();
        $this->accessToken = $accessToken;
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    protected function get(string $endpoint, array $data = [])
    {
        return $this->doApiRequest($endpoint, 'GET', $data);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    protected function post(string $endpoint, array $data = [])
    {
        return $this->doApiRequest($endpoint, 'POST', $data);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    protected function put(string $endpoint, array $data = [])
    {
        return $this->doApiRequest($endpoint, 'PUT', $data);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    protected function patch(string $endpoint, array $data = [])
    {
        return $this->doApiRequest($endpoint, 'PATCH', $data);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    protected function delete(string $endpoint, array $data = [])
    {
        return $this->doApiRequest($endpoint, 'DELETE', $data);
    }

    /**
     * Sets the Curl client.
     * @throws \ErrorException
     */
    public function buildCurlClient()
    {
        /** @var Curl $curl */
        $curl = new Curl();

        $curl->setUserAgent('nybbl.byte.api.lib');
        $this->setCurlClient($curl);
    }

    /**
     * @param string $endpoint
     * @param string $method
     * @param array $data
     * @return mixed
     */
    private function doApiRequest(string $endpoint, string $method, array $data = [])
    {
        // Build the complete URL to include the API token
        $endpoint = $this->buildURL($endpoint);

        switch (strtolower($method)) {
            case 'get':
                if (!empty($data)) {
                    $this->getCurlClient()->get($endpoint. '?' . http_build_query($data));
                } else {
                    $this->getCurlClient()->get($endpoint);
                }
                break;

            case 'post':
                if (!empty($data)) {
                    $this->getCurlClient()->post($endpoint, $data);
                } else {
                    $this->getCurlClient()->post($endpoint);
                }
                break;

            case 'put':
                if (!empty($data)) {
                    $this->getCurlClient()->put($endpoint, $data);
                } else {
                    $this->getCurlClient()->put($endpoint);
                }
                break;

            case 'patch':
                if (!empty($data)) {
                    $this->getCurlClient()->patch($endpoint, $data);
                } else {
                    $this->getCurlClient()->patch($endpoint);
                }
                break;

            case 'delete':
                if (!empty($data)) {
                    $this->getCurlClient()->delete($endpoint, [], $data);
                } else {
                    $this->getCurlClient()->delete($endpoint);
                }
                break;
        }

        return json_decode(json_encode($this->getCurlClient()->response), true);
    }

    /**
     * Sets the access token.
     * @param string $accessToken
     */
    public function authenticate(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param string $endpoint
     * @return string
     */
    private function buildUrl(string $endpoint): string
    {
        return $this->apiUrl . $endpoint;
    }

    # --------------------------------------------------------------------
    # GETTERS AND SETTERS
    # --------------------------------------------------------------------

    /**
     * @return Curl
     */
    protected function getCurlClient(): Curl
    {
        return $this->curlClient;
    }

    /**
     * @param Curl $curlClient
     * @return $this
     */
    protected function setCurlClient(Curl $curlClient)
    {
        $this->curlClient = $curlClient;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     * @return $this
     */
    protected function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return $this
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }
}
<?php

namespace Holded;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Caller
{
    private $baseUrl = 'https://api.holded.com/api';

    protected $token;

    private $endpoint;
    private $base_endpoint;

    private $method;

    private $client;

    public function __construct($token = '')
    {
        $this->client = new Client();
        $this->token = $token;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
    public function setBaseEndpoint(string $base_endpoint)
    {
        $this->base_endpoint = $base_endpoint;
    }
    public function setEndpoint(string $endpoint, $pluralize = false)
    {
        $this->endpoint = $endpoint . ($pluralize ? 's' : '');
    }

    public function setMethod(string $method)
    {
        $values = explode('::', $method);
        $this->method = $values[count($values) - 1];
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl( $id = '')
    {
        $url = [
            $this->baseUrl, $this->base_endpoint, $this->endpoint
        ];
        if (is_array($id))
            $url = array_merge($url,$id);
        else {
            array_push( $url,$id );
        }
        
        
        return implode('/', array_filter($url));
    }

    public function call(array $params = [], $id = '')
    {
        $params = array_merge(['headers' =>['key' => $this->token]], $params);



        switch ($this->method) {
            case 'list':
                $method='GET';
                break;
            case 'create':
                $method='POST';
                break;
            case 'pay':
                $method='POST';
                break;
            default:
                return;
                break;
        }

        if (isset($params['body'])) {
            $params['headers']['Content-Type'] = 'application/json'; 
            $params['body'] = json_encode($params['body']);
        }


        try {
            $response = $this->client->request( $method, $this->getUrl($id), $params);
        } catch (ClientException $e) {
            throw $e;
        }
        
        //   ->$this->method($this->getUrl($id), ['form_params' => $params])
        //    ->getBody();
        $patata1=  $response->getHeaderLine('Content-Type');
        $patata2=$response->getBody();
        $patata3=$response->getReasonPhrase();
        return json_decode($response->getBody(), true);
    }
}
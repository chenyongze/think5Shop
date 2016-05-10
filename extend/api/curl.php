<?php

namespace extend\api;


class curl
{
    private $header = [
        'Pragma' => "no-cache",
        'Cache-Control' => "no-cache",
        'Connection' => "close"
    ];
    public $url = 'http:://';
    public $timeOut = 30;
    public $requestData = [];
    public $type = 'get';
    private $responseCode;
    private $responseData;

    public function __construct()
    {

    }

    public function init($setting)
    {
        foreach($setting as $key => $value)
        {
            if(!property_exists($this, $key)) continue;
            if($key == 'header')
            {
                $this->header = array_merge($this->header, $value);
                continue;
            }
            $this->$key = $value;
        }
    }

    public function request($data, $tll = -1)
    {
        $this->requestData = $data;
        if ($this->type == 'get') {
            $this->url .= '?' . http_build_query($this->requestData);
        }
        return $this->_remote();
    }

    private function _remote()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->requestData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeOut);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, $this->type == 'post' ? true : false);

        $this->responseData = curl_exec($ch);
        $this->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($this->responseCode != '200')
            $this->_response();
        return json_decode($this->responseData);
    }

    /**
     * @return bool
     */
    private function _response()
    {
        switch ($this->responseCode) {
            case 301:
            case 302:

                return false;
            case 200:

                return $this->responseData;

            case 404:

                return false;

            default:
                return false;
        }
    }
}
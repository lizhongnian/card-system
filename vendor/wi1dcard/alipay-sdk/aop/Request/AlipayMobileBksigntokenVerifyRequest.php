<?php
 namespace Alipay\Request; class AlipayMobileBksigntokenVerifyRequest extends AbstractAlipayRequest { private $deviceid; private $source; private $token; public function setDeviceid($deviceid) { $this->deviceid = $deviceid; $this->apiParams['deviceid'] = $deviceid; } public function getDeviceid() { return $this->deviceid; } public function setSource($source) { $this->source = $source; $this->apiParams['source'] = $source; } public function getSource() { return $this->source; } public function setToken($token) { $this->token = $token; $this->apiParams['token'] = $token; } public function getToken() { return $this->token; } } 
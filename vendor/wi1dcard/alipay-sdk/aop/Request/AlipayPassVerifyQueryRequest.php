<?php
 namespace Alipay\Request; class AlipayPassVerifyQueryRequest extends AbstractAlipayRequest { private $verifyCode; public function setVerifyCode($verifyCode) { $this->verifyCode = $verifyCode; $this->apiParams['verify_code'] = $verifyCode; } public function getVerifyCode() { return $this->verifyCode; } } 
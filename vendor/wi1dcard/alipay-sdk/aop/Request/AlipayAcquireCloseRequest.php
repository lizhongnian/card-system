<?php
 namespace Alipay\Request; class AlipayAcquireCloseRequest extends AbstractAlipayRequest { private $operatorId; private $outTradeNo; private $tradeNo; public function setOperatorId($operatorId) { $this->operatorId = $operatorId; $this->apiParams['operator_id'] = $operatorId; } public function getOperatorId() { return $this->operatorId; } public function setOutTradeNo($outTradeNo) { $this->outTradeNo = $outTradeNo; $this->apiParams['out_trade_no'] = $outTradeNo; } public function getOutTradeNo() { return $this->outTradeNo; } public function setTradeNo($tradeNo) { $this->tradeNo = $tradeNo; $this->apiParams['trade_no'] = $tradeNo; } public function getTradeNo() { return $this->tradeNo; } } 
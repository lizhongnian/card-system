<?php
 namespace Alipay\Request; class AlipayPointOrderAddRequest extends AbstractAlipayRequest { private $memo; private $merchantOrderNo; private $orderTime; private $pointCount; private $userSymbol; private $userSymbolType; public function setMemo($memo) { $this->memo = $memo; $this->apiParams['memo'] = $memo; } public function getMemo() { return $this->memo; } public function setMerchantOrderNo($merchantOrderNo) { $this->merchantOrderNo = $merchantOrderNo; $this->apiParams['merchant_order_no'] = $merchantOrderNo; } public function getMerchantOrderNo() { return $this->merchantOrderNo; } public function setOrderTime($orderTime) { $this->orderTime = $orderTime; $this->apiParams['order_time'] = $orderTime; } public function getOrderTime() { return $this->orderTime; } public function setPointCount($pointCount) { $this->pointCount = $pointCount; $this->apiParams['point_count'] = $pointCount; } public function getPointCount() { return $this->pointCount; } public function setUserSymbol($userSymbol) { $this->userSymbol = $userSymbol; $this->apiParams['user_symbol'] = $userSymbol; } public function getUserSymbol() { return $this->userSymbol; } public function setUserSymbolType($userSymbolType) { $this->userSymbolType = $userSymbolType; $this->apiParams['user_symbol_type'] = $userSymbolType; } public function getUserSymbolType() { return $this->userSymbolType; } } 
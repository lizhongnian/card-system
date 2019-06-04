<?php
 namespace Alipay\Request; class AlipayEbppPdeductSignAddRequest extends AbstractAlipayRequest { private $agentChannel; private $agentCode; private $billKey; private $bizType; private $chargeInst; private $deductProdCode; private $deductType; private $extUserInfo; private $extendField; private $notifyConfig; private $outAgreementId; private $ownerName; private $payConfig; private $payPasswordToken; private $pid; private $signExpireDate; private $subBizType; private $userId; public function setAgentChannel($agentChannel) { $this->agentChannel = $agentChannel; $this->apiParams['agent_channel'] = $agentChannel; } public function getAgentChannel() { return $this->agentChannel; } public function setAgentCode($agentCode) { $this->agentCode = $agentCode; $this->apiParams['agent_code'] = $agentCode; } public function getAgentCode() { return $this->agentCode; } public function setBillKey($billKey) { $this->billKey = $billKey; $this->apiParams['bill_key'] = $billKey; } public function getBillKey() { return $this->billKey; } public function setBizType($bizType) { $this->bizType = $bizType; $this->apiParams['biz_type'] = $bizType; } public function getBizType() { return $this->bizType; } public function setChargeInst($chargeInst) { $this->chargeInst = $chargeInst; $this->apiParams['charge_inst'] = $chargeInst; } public function getChargeInst() { return $this->chargeInst; } public function setDeductProdCode($deductProdCode) { $this->deductProdCode = $deductProdCode; $this->apiParams['deduct_prod_code'] = $deductProdCode; } public function getDeductProdCode() { return $this->deductProdCode; } public function setDeductType($deductType) { $this->deductType = $deductType; $this->apiParams['deduct_type'] = $deductType; } public function getDeductType() { return $this->deductType; } public function setExtUserInfo($extUserInfo) { $this->extUserInfo = $extUserInfo; $this->apiParams['ext_user_info'] = $extUserInfo; } public function getExtUserInfo() { return $this->extUserInfo; } public function setExtendField($extendField) { $this->extendField = $extendField; $this->apiParams['extend_field'] = $extendField; } public function getExtendField() { return $this->extendField; } public function setNotifyConfig($notifyConfig) { $this->notifyConfig = $notifyConfig; $this->apiParams['notify_config'] = $notifyConfig; } public function getNotifyConfig() { return $this->notifyConfig; } public function setOutAgreementId($outAgreementId) { $this->outAgreementId = $outAgreementId; $this->apiParams['out_agreement_id'] = $outAgreementId; } public function getOutAgreementId() { return $this->outAgreementId; } public function setOwnerName($ownerName) { $this->ownerName = $ownerName; $this->apiParams['owner_name'] = $ownerName; } public function getOwnerName() { return $this->ownerName; } public function setPayConfig($payConfig) { $this->payConfig = $payConfig; $this->apiParams['pay_config'] = $payConfig; } public function getPayConfig() { return $this->payConfig; } public function setPayPasswordToken($payPasswordToken) { $this->payPasswordToken = $payPasswordToken; $this->apiParams['pay_password_token'] = $payPasswordToken; } public function getPayPasswordToken() { return $this->payPasswordToken; } public function setPid($pid) { $this->pid = $pid; $this->apiParams['pid'] = $pid; } public function getPid() { return $this->pid; } public function setSignExpireDate($signExpireDate) { $this->signExpireDate = $signExpireDate; $this->apiParams['sign_expire_date'] = $signExpireDate; } public function getSignExpireDate() { return $this->signExpireDate; } public function setSubBizType($subBizType) { $this->subBizType = $subBizType; $this->apiParams['sub_biz_type'] = $subBizType; } public function getSubBizType() { return $this->subBizType; } public function setUserId($userId) { $this->userId = $userId; $this->apiParams['user_id'] = $userId; } public function getUserId() { return $this->userId; } } 
<?php
 namespace Alipay\Request; class AlipayOpenPublicLifeAccountCreateRequest extends AbstractAlipayRequest { private $background; private $catagoryId; private $contactEmail; private $contactTel; private $content; private $customerTel; private $lifeName; private $logo; private $userId; public function setBackground($background) { $this->background = $background; $this->apiParams['background'] = $background; } public function getBackground() { return $this->background; } public function setCatagoryId($catagoryId) { $this->catagoryId = $catagoryId; $this->apiParams['catagory_id'] = $catagoryId; } public function getCatagoryId() { return $this->catagoryId; } public function setContactEmail($contactEmail) { $this->contactEmail = $contactEmail; $this->apiParams['contact_email'] = $contactEmail; } public function getContactEmail() { return $this->contactEmail; } public function setContactTel($contactTel) { $this->contactTel = $contactTel; $this->apiParams['contact_tel'] = $contactTel; } public function getContactTel() { return $this->contactTel; } public function setContent($content) { $this->content = $content; $this->apiParams['content'] = $content; } public function getContent() { return $this->content; } public function setCustomerTel($customerTel) { $this->customerTel = $customerTel; $this->apiParams['customer_tel'] = $customerTel; } public function getCustomerTel() { return $this->customerTel; } public function setLifeName($lifeName) { $this->lifeName = $lifeName; $this->apiParams['life_name'] = $lifeName; } public function getLifeName() { return $this->lifeName; } public function setLogo($logo) { $this->logo = $logo; $this->apiParams['logo'] = $logo; } public function getLogo() { return $this->logo; } public function setUserId($userId) { $this->userId = $userId; $this->apiParams['user_id'] = $userId; } public function getUserId() { return $this->userId; } } 
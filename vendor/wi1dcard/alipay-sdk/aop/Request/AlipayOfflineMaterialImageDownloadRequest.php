<?php
 namespace Alipay\Request; class AlipayOfflineMaterialImageDownloadRequest extends AbstractAlipayRequest { private $imageIds; public function setImageIds($imageIds) { $this->imageIds = $imageIds; $this->apiParams['image_ids'] = $imageIds; } public function getImageIds() { return $this->imageIds; } } 
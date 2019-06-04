<?php
 namespace Alipay\Request; class AlipayOpenMiniVersionAuditApplyRequest extends AbstractAlipayRequest { private $appCategoryIds; private $appDesc; private $appEnglishName; private $appLogo; private $appName; private $appSlogan; private $appVersion; private $fifthLicensePic; private $fifthScreenShot; private $firstLicensePic; private $firstScreenShot; private $fourthLicensePic; private $fourthScreenShot; private $licenseName; private $licenseNo; private $licenseValidDate; private $memo; private $outDoorPic; private $regionType; private $secondLicensePic; private $secondScreenShot; private $serviceEmail; private $servicePhone; private $serviceRegionInfo; private $thirdLicensePic; private $thirdScreenShot; private $versionDesc; public function setAppCategoryIds($appCategoryIds) { $this->appCategoryIds = $appCategoryIds; $this->apiParams['app_category_ids'] = $appCategoryIds; } public function getAppCategoryIds() { return $this->appCategoryIds; } public function setAppDesc($appDesc) { $this->appDesc = $appDesc; $this->apiParams['app_desc'] = $appDesc; } public function getAppDesc() { return $this->appDesc; } public function setAppEnglishName($appEnglishName) { $this->appEnglishName = $appEnglishName; $this->apiParams['app_english_name'] = $appEnglishName; } public function getAppEnglishName() { return $this->appEnglishName; } public function setAppLogo($appLogo) { $this->appLogo = $appLogo; $this->apiParams['app_logo'] = $appLogo; } public function getAppLogo() { return $this->appLogo; } public function setAppName($appName) { $this->appName = $appName; $this->apiParams['app_name'] = $appName; } public function getAppName() { return $this->appName; } public function setAppSlogan($appSlogan) { $this->appSlogan = $appSlogan; $this->apiParams['app_slogan'] = $appSlogan; } public function getAppSlogan() { return $this->appSlogan; } public function setAppVersion($appVersion) { $this->appVersion = $appVersion; $this->apiParams['app_version'] = $appVersion; } public function getAppVersion() { return $this->appVersion; } public function setFifthLicensePic($fifthLicensePic) { $this->fifthLicensePic = $fifthLicensePic; $this->apiParams['fifth_license_pic'] = $fifthLicensePic; } public function getFifthLicensePic() { return $this->fifthLicensePic; } public function setFifthScreenShot($fifthScreenShot) { $this->fifthScreenShot = $fifthScreenShot; $this->apiParams['fifth_screen_shot'] = $fifthScreenShot; } public function getFifthScreenShot() { return $this->fifthScreenShot; } public function setFirstLicensePic($firstLicensePic) { $this->firstLicensePic = $firstLicensePic; $this->apiParams['first_license_pic'] = $firstLicensePic; } public function getFirstLicensePic() { return $this->firstLicensePic; } public function setFirstScreenShot($firstScreenShot) { $this->firstScreenShot = $firstScreenShot; $this->apiParams['first_screen_shot'] = $firstScreenShot; } public function getFirstScreenShot() { return $this->firstScreenShot; } public function setFourthLicensePic($fourthLicensePic) { $this->fourthLicensePic = $fourthLicensePic; $this->apiParams['fourth_license_pic'] = $fourthLicensePic; } public function getFourthLicensePic() { return $this->fourthLicensePic; } public function setFourthScreenShot($fourthScreenShot) { $this->fourthScreenShot = $fourthScreenShot; $this->apiParams['fourth_screen_shot'] = $fourthScreenShot; } public function getFourthScreenShot() { return $this->fourthScreenShot; } public function setLicenseName($licenseName) { $this->licenseName = $licenseName; $this->apiParams['license_name'] = $licenseName; } public function getLicenseName() { return $this->licenseName; } public function setLicenseNo($licenseNo) { $this->licenseNo = $licenseNo; $this->apiParams['license_no'] = $licenseNo; } public function getLicenseNo() { return $this->licenseNo; } public function setLicenseValidDate($licenseValidDate) { $this->licenseValidDate = $licenseValidDate; $this->apiParams['license_valid_date'] = $licenseValidDate; } public function getLicenseValidDate() { return $this->licenseValidDate; } public function setMemo($memo) { $this->memo = $memo; $this->apiParams['memo'] = $memo; } public function getMemo() { return $this->memo; } public function setOutDoorPic($outDoorPic) { $this->outDoorPic = $outDoorPic; $this->apiParams['out_door_pic'] = $outDoorPic; } public function getOutDoorPic() { return $this->outDoorPic; } public function setRegionType($regionType) { $this->regionType = $regionType; $this->apiParams['region_type'] = $regionType; } public function getRegionType() { return $this->regionType; } public function setSecondLicensePic($secondLicensePic) { $this->secondLicensePic = $secondLicensePic; $this->apiParams['second_license_pic'] = $secondLicensePic; } public function getSecondLicensePic() { return $this->secondLicensePic; } public function setSecondScreenShot($secondScreenShot) { $this->secondScreenShot = $secondScreenShot; $this->apiParams['second_screen_shot'] = $secondScreenShot; } public function getSecondScreenShot() { return $this->secondScreenShot; } public function setServiceEmail($serviceEmail) { $this->serviceEmail = $serviceEmail; $this->apiParams['service_email'] = $serviceEmail; } public function getServiceEmail() { return $this->serviceEmail; } public function setServicePhone($servicePhone) { $this->servicePhone = $servicePhone; $this->apiParams['service_phone'] = $servicePhone; } public function getServicePhone() { return $this->servicePhone; } public function setServiceRegionInfo($serviceRegionInfo) { $this->serviceRegionInfo = $serviceRegionInfo; $this->apiParams['service_region_info'] = $serviceRegionInfo; } public function getServiceRegionInfo() { return $this->serviceRegionInfo; } public function setThirdLicensePic($thirdLicensePic) { $this->thirdLicensePic = $thirdLicensePic; $this->apiParams['third_license_pic'] = $thirdLicensePic; } public function getThirdLicensePic() { return $this->thirdLicensePic; } public function setThirdScreenShot($thirdScreenShot) { $this->thirdScreenShot = $thirdScreenShot; $this->apiParams['third_screen_shot'] = $thirdScreenShot; } public function getThirdScreenShot() { return $this->thirdScreenShot; } public function setVersionDesc($versionDesc) { $this->versionDesc = $versionDesc; $this->apiParams['version_desc'] = $versionDesc; } public function getVersionDesc() { return $this->versionDesc; } } 
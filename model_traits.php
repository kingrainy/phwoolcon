<?php
if (defined('PHWOOLCON_MODELS_TRAIT_LOADED')) {
    return;
}
define('PHWOOLCON_MODELS_TRAIT_LOADED', true);

trait ConfigModelTrait
{
    // protected $_table = 'config';

    public $key;
    public $value;

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param $key
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByKey($key)
    {
        return static::findSimple([
            'key' => $key,
        ]);
    }

    /**
     * @param $key
     * @return static|false
     */
    public static function findFirstByKey($key)
    {
        return static::findFirstSimple([
            'key' => $key,
        ]);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}

trait CounterModelTrait
{
    // protected $_table = 'counter';

    public $key;
    public $value;

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param $key
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByKey($key)
    {
        return static::findSimple([
            'key' => $key,
        ]);
    }

    /**
     * @param $key
     * @return static|false
     */
    public static function findFirstByKey($key)
    {
        return static::findFirstSimple([
            'key' => $key,
        ]);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}

trait LdAppAuthInfoModelTrait
{
    // protected $_table = 'ld_app_auth_info';

    public $id;
    public $bid;
    public $enterprise_type;
    public $enterprise_name;
    public $license_number;
    public $licence_imgurl;
    public $business_industry;
    public $opening_name;
    public $opening_bank;
    public $bank_account;
    public $admin_name;
    public $admin_id_mumber;
    public $admin_phone_number;
    public $admin_mailbox;
    public $app_name;
    public $app_imgurl;
    public $app_intro;
    public $server_type;
    public $status;
    public $dismissal;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getEnterpriseType()
    {
        return $this->enterprise_type;
    }

    public function setEnterpriseType($enterpriseType)
    {
        $this->enterprise_type = $enterpriseType;
        return $this;
    }

    public function getEnterpriseName()
    {
        return $this->enterprise_name;
    }

    public function setEnterpriseName($enterpriseName)
    {
        $this->enterprise_name = $enterpriseName;
        return $this;
    }

    public function getLicenseNumber()
    {
        return $this->license_number;
    }

    public function setLicenseNumber($licenseNumber)
    {
        $this->license_number = $licenseNumber;
        return $this;
    }

    public function getLicenceImgurl()
    {
        return $this->licence_imgurl;
    }

    public function setLicenceImgurl($licenceImgurl)
    {
        $this->licence_imgurl = $licenceImgurl;
        return $this;
    }

    public function getBusinessIndustry()
    {
        return $this->business_industry;
    }

    public function setBusinessIndustry($businessIndustry)
    {
        $this->business_industry = $businessIndustry;
        return $this;
    }

    public function getOpeningName()
    {
        return $this->opening_name;
    }

    public function setOpeningName($openingName)
    {
        $this->opening_name = $openingName;
        return $this;
    }

    public function getOpeningBank()
    {
        return $this->opening_bank;
    }

    public function setOpeningBank($openingBank)
    {
        $this->opening_bank = $openingBank;
        return $this;
    }

    public function getBankAccount()
    {
        return $this->bank_account;
    }

    public function setBankAccount($bankAccount)
    {
        $this->bank_account = $bankAccount;
        return $this;
    }

    public function getAdminName()
    {
        return $this->admin_name;
    }

    public function setAdminName($adminName)
    {
        $this->admin_name = $adminName;
        return $this;
    }

    public function getAdminIdMumber()
    {
        return $this->admin_id_mumber;
    }

    public function setAdminIdMumber($adminIdMumber)
    {
        $this->admin_id_mumber = $adminIdMumber;
        return $this;
    }

    public function getAdminPhoneNumber()
    {
        return $this->admin_phone_number;
    }

    public function setAdminPhoneNumber($adminPhoneNumber)
    {
        $this->admin_phone_number = $adminPhoneNumber;
        return $this;
    }

    public function getAdminMailbox()
    {
        return $this->admin_mailbox;
    }

    public function setAdminMailbox($adminMailbox)
    {
        $this->admin_mailbox = $adminMailbox;
        return $this;
    }

    public function getAppName()
    {
        return $this->app_name;
    }

    public function setAppName($appName)
    {
        $this->app_name = $appName;
        return $this;
    }

    public function getAppImgurl()
    {
        return $this->app_imgurl;
    }

    public function setAppImgurl($appImgurl)
    {
        $this->app_imgurl = $appImgurl;
        return $this;
    }

    public function getAppIntro()
    {
        return $this->app_intro;
    }

    public function setAppIntro($appIntro)
    {
        $this->app_intro = $appIntro;
        return $this;
    }

    public function getServerType()
    {
        return $this->server_type;
    }

    public function setServerType($serverType)
    {
        $this->server_type = $serverType;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getDismissal()
    {
        return $this->dismissal;
    }

    public function setDismissal($dismissal)
    {
        $this->dismissal = $dismissal;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBespeakModelTrait
{
    // protected $_table = 'ld_bespeak';

    public $id;
    public $business_token;
    public $serial_num;
    public $title;
    public $pic;
    public $details;
    public $cost_price;
    public $current_price;
    public $inventory;
    public $last_num;
    public $start_day;
    public $end_day;
    public $start_time;
    public $end_time;
    public $recommend;
    public $grounding;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBusinessToken()
    {
        return $this->business_token;
    }

    public function setBusinessToken($businessToken)
    {
        $this->business_token = $businessToken;
        return $this;
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getPic()
    {
        return $this->pic;
    }

    public function setPic($pic)
    {
        $this->pic = $pic;
        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function getCostPrice()
    {
        return $this->cost_price;
    }

    public function setCostPrice($costPrice)
    {
        $this->cost_price = $costPrice;
        return $this;
    }

    public function getCurrentPrice()
    {
        return $this->current_price;
    }

    public function setCurrentPrice($currentPrice)
    {
        $this->current_price = $currentPrice;
        return $this;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    public function getLastNum()
    {
        return $this->last_num;
    }

    public function setLastNum($lastNum)
    {
        $this->last_num = $lastNum;
        return $this;
    }

    public function getStartDay()
    {
        return $this->start_day;
    }

    public function setStartDay($startDay)
    {
        $this->start_day = $startDay;
        return $this;
    }

    public function getEndDay()
    {
        return $this->end_day;
    }

    public function setEndDay($endDay)
    {
        $this->end_day = $endDay;
        return $this;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;
        return $this;
    }

    public function getEndTime()
    {
        return $this->end_time;
    }

    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;
        return $this;
    }

    public function getRecommend()
    {
        return $this->recommend;
    }

    public function setRecommend($recommend)
    {
        $this->recommend = $recommend;
        return $this;
    }

    public function getGrounding()
    {
        return $this->grounding;
    }

    public function setGrounding($grounding)
    {
        $this->grounding = $grounding;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdBusinessApp3rdAuthModelTrait
{
    // protected $_table = 'ld_business_app_3rd_auth';

    public $id;
    public $bid;
    public $appid;
    public $ptoken;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getAppid()
    {
        return $this->appid;
    }

    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    public function getPtoken()
    {
        return $this->ptoken;
    }

    public function setPtoken($ptoken)
    {
        $this->ptoken = $ptoken;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessAppCodeModelTrait
{
    // protected $_table = 'ld_business_app_code';

    public $id;
    public $app_id;
    public $template_id;
    public $commit_id;
    public $status;
    public $created_at;
    public $updated_at;
    public $reason;
    public $version;
    public $content;
    public $push_status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getAppId()
    {
        return $this->app_id;
    }

    public function setAppId($appId)
    {
        $this->app_id = $appId;
        return $this;
    }

    public function getTemplateId()
    {
        return $this->template_id;
    }

    public function setTemplateId($templateId)
    {
        $this->template_id = $templateId;
        return $this;
    }

    public function getCommitId()
    {
        return $this->commit_id;
    }

    public function setCommitId($commitId)
    {
        $this->commit_id = $commitId;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getPushStatus()
    {
        return $this->push_status;
    }

    public function setPushStatus($pushStatus)
    {
        $this->push_status = $pushStatus;
        return $this;
    }
}

trait LdBusinessAppInfoModelTrait
{
    // protected $_table = 'ld_business_app_info';

    public $id;
    public $bid;
    public $appid;
    public $nick_name;
    public $head_img;
    public $verify_type_info;
    public $user_name;
    public $signature;
    public $principal_name;
    public $business_info;
    public $qrcode_url;
    public $func_info;
    public $network;
    public $categories;
    public $ptoken;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getAppid()
    {
        return $this->appid;
    }

    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    public function getNickName()
    {
        return $this->nick_name;
    }

    public function setNickName($nickName)
    {
        $this->nick_name = $nickName;
        return $this;
    }

    public function getHeadImg()
    {
        return $this->head_img;
    }

    public function setHeadImg($headImg)
    {
        $this->head_img = $headImg;
        return $this;
    }

    public function getVerifyTypeInfo()
    {
        return $this->verify_type_info;
    }

    public function setVerifyTypeInfo($verifyTypeInfo)
    {
        $this->verify_type_info = $verifyTypeInfo;
        return $this;
    }

    public function getUserName()
    {
        return $this->user_name;
    }

    public function setUserName($userName)
    {
        $this->user_name = $userName;
        return $this;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }

    public function getPrincipalName()
    {
        return $this->principal_name;
    }

    public function setPrincipalName($principalName)
    {
        $this->principal_name = $principalName;
        return $this;
    }

    public function getBusinessInfo()
    {
        return $this->business_info;
    }

    public function setBusinessInfo($businessInfo)
    {
        $this->business_info = $businessInfo;
        return $this;
    }

    public function getQrcodeUrl()
    {
        return $this->qrcode_url;
    }

    public function setQrcodeUrl($qrcodeUrl)
    {
        $this->qrcode_url = $qrcodeUrl;
        return $this;
    }

    public function getFuncInfo()
    {
        return $this->func_info;
    }

    public function setFuncInfo($funcInfo)
    {
        $this->func_info = $funcInfo;
        return $this;
    }

    public function getNetwork()
    {
        return $this->network;
    }

    public function setNetwork($network)
    {
        $this->network = $network;
        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    public function getPtoken()
    {
        return $this->ptoken;
    }

    public function setPtoken($ptoken)
    {
        $this->ptoken = $ptoken;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessBillModelTrait
{
    // protected $_table = 'ld_business_bill';

    public $id;
    public $utoken;
    public $order_id;
    public $pay_id;
    public $industry_id;
    public $shop_id;
    public $type;
    public $price;
    public $order_img;
    public $remark;
    public $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getUtoken()
    {
        return $this->utoken;
    }

    public function setUtoken($utoken)
    {
        $this->utoken = $utoken;
        return $this;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;
        return $this;
    }

    public function getPayId()
    {
        return $this->pay_id;
    }

    public function setPayId($payId)
    {
        $this->pay_id = $payId;
        return $this;
    }

    public function getIndustryId()
    {
        return $this->industry_id;
    }

    public function setIndustryId($industryId)
    {
        $this->industry_id = $industryId;
        return $this;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setShopId($shopId)
    {
        $this->shop_id = $shopId;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getOrderImg()
    {
        return $this->order_img;
    }

    public function setOrderImg($orderImg)
    {
        $this->order_img = $orderImg;
        return $this;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
}

trait LdBusinessFinanceInfoModelTrait
{
    // protected $_table = 'ld_business_finance_info';

    public $id;
    public $utoken;
    public $sales;
    public $balances;
    public $refunds;
    public $order_total;
    public $chargeback_total;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getUtoken()
    {
        return $this->utoken;
    }

    public function setUtoken($utoken)
    {
        $this->utoken = $utoken;
        return $this;
    }

    public function getSales()
    {
        return $this->sales;
    }

    public function setSales($sales)
    {
        $this->sales = $sales;
        return $this;
    }

    public function getBalances()
    {
        return $this->balances;
    }

    public function setBalances($balances)
    {
        $this->balances = $balances;
        return $this;
    }

    public function getRefunds()
    {
        return $this->refunds;
    }

    public function setRefunds($refunds)
    {
        $this->refunds = $refunds;
        return $this;
    }

    public function getOrderTotal()
    {
        return $this->order_total;
    }

    public function setOrderTotal($orderTotal)
    {
        $this->order_total = $orderTotal;
        return $this;
    }

    public function getChargebackTotal()
    {
        return $this->chargeback_total;
    }

    public function setChargebackTotal($chargebackTotal)
    {
        $this->chargeback_total = $chargebackTotal;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessIndustryModelTrait
{
    // protected $_table = 'ld_business_industry';

    public $id;
    public $name;
    public $level;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }
}

trait LdBusinessInfoModelTrait
{
    // protected $_table = 'ld_business_info';

    public $id;
    public $phone_number;
    public $name;
    public $business_imgurl;
    public $province;
    public $city;
    public $country;
    public $first_industry;
    public $second_industry;
    public $proxy_token;
    public $proxy_name;
    public $message;
    public $status;
    public $account_source;
    public $auth_time;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;
        return $this;
    }

    /**
     * @param $phoneNumber
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByPhoneNumber($phoneNumber)
    {
        return static::findSimple([
            'phone_number' => $phoneNumber,
        ]);
    }

    /**
     * @param $phoneNumber
     * @return static|false
     */
    public static function findFirstByPhoneNumber($phoneNumber)
    {
        return static::findFirstSimple([
            'phone_number' => $phoneNumber,
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getBusinessImgurl()
    {
        return $this->business_imgurl;
    }

    public function setBusinessImgurl($businessImgurl)
    {
        $this->business_imgurl = $businessImgurl;
        return $this;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getFirstIndustry()
    {
        return $this->first_industry;
    }

    public function setFirstIndustry($firstIndustry)
    {
        $this->first_industry = $firstIndustry;
        return $this;
    }

    public function getSecondIndustry()
    {
        return $this->second_industry;
    }

    public function setSecondIndustry($secondIndustry)
    {
        $this->second_industry = $secondIndustry;
        return $this;
    }

    public function getProxyToken()
    {
        return $this->proxy_token;
    }

    public function setProxyToken($proxyToken)
    {
        $this->proxy_token = $proxyToken;
        return $this;
    }

    public function getProxyName()
    {
        return $this->proxy_name;
    }

    public function setProxyName($proxyName)
    {
        $this->proxy_name = $proxyName;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getAccountSource()
    {
        return $this->account_source;
    }

    public function setAccountSource($accountSource)
    {
        $this->account_source = $accountSource;
        return $this;
    }

    public function getAuthTime()
    {
        return $this->auth_time;
    }

    public function setAuthTime($authTime)
    {
        $this->auth_time = $authTime;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessLastloginInfoModelTrait
{
    // protected $_table = 'ld_business_lastlogin_info';

    public $id;
    public $bid;
    public $longitude;
    public $latitude;
    public $login_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLoginAt()
    {
        return $this->login_at;
    }

    public function setLoginAt($loginAt)
    {
        $this->login_at = $loginAt;
        return $this;
    }
}

trait LdBusinessLoginAuthModelTrait
{
    // protected $_table = 'ld_business_login_auth';

    public $id;
    public $bid;
    public $name;
    public $phone_number;
    public $pwd;
    public $status;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;
        return $this;
    }

    /**
     * @param $phoneNumber
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByPhoneNumber($phoneNumber)
    {
        return static::findSimple([
            'phone_number' => $phoneNumber,
        ]);
    }

    /**
     * @param $phoneNumber
     * @return static|false
     */
    public static function findFirstByPhoneNumber($phoneNumber)
    {
        return static::findFirstSimple([
            'phone_number' => $phoneNumber,
        ]);
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessPayConfigModelTrait
{
    // protected $_table = 'ld_business_pay_config';

    public $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }
}

trait LdBusinessPayLogModelTrait
{
    // protected $_table = 'ld_business_pay_log';

    public $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }
}

trait LdBusinessPayOrderModelTrait
{
    // protected $_table = 'ld_business_pay_order';

    public $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }
}

trait LdBusinessRegisterRecordModelTrait
{
    // protected $_table = 'ld_business_register_record';

    public $id;
    public $phone_number;
    public $name;
    public $province;
    public $city;
    public $country;
    public $first_industry;
    public $second_industry;
    public $proxy_token;
    public $proxy_name;
    public $message;
    public $allocate_status;
    public $operated_at;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;
        return $this;
    }

    /**
     * @param $phoneNumber
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByPhoneNumber($phoneNumber)
    {
        return static::findSimple([
            'phone_number' => $phoneNumber,
        ]);
    }

    /**
     * @param $phoneNumber
     * @return static|false
     */
    public static function findFirstByPhoneNumber($phoneNumber)
    {
        return static::findFirstSimple([
            'phone_number' => $phoneNumber,
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getFirstIndustry()
    {
        return $this->first_industry;
    }

    public function setFirstIndustry($firstIndustry)
    {
        $this->first_industry = $firstIndustry;
        return $this;
    }

    public function getSecondIndustry()
    {
        return $this->second_industry;
    }

    public function setSecondIndustry($secondIndustry)
    {
        $this->second_industry = $secondIndustry;
        return $this;
    }

    public function getProxyToken()
    {
        return $this->proxy_token;
    }

    public function setProxyToken($proxyToken)
    {
        $this->proxy_token = $proxyToken;
        return $this;
    }

    public function getProxyName()
    {
        return $this->proxy_name;
    }

    public function setProxyName($proxyName)
    {
        $this->proxy_name = $proxyName;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getAllocateStatus()
    {
        return $this->allocate_status;
    }

    public function setAllocateStatus($allocateStatus)
    {
        $this->allocate_status = $allocateStatus;
        return $this;
    }

    public function getOperatedAt()
    {
        return $this->operated_at;
    }

    public function setOperatedAt($operatedAt)
    {
        $this->operated_at = $operatedAt;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessShopModelTrait
{
    // protected $_table = 'ld_business_shop';

    public $id;
    public $mtoken;
    public $shop_name;
    public $shop_address;
    public $shop_phone;
    public $lat;
    public $lng;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }

    public function getShopName()
    {
        return $this->shop_name;
    }

    public function setShopName($shopName)
    {
        $this->shop_name = $shopName;
        return $this;
    }

    public function getShopAddress()
    {
        return $this->shop_address;
    }

    public function setShopAddress($shopAddress)
    {
        $this->shop_address = $shopAddress;
        return $this;
    }

    public function getShopPhone()
    {
        return $this->shop_phone;
    }

    public function setShopPhone($shopPhone)
    {
        $this->shop_phone = $shopPhone;
        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdBusinessWxnumberInfoModelTrait
{
    // protected $_table = 'ld_business_wxnumber_info';

    public $id;
    public $bid;
    public $openid;
    public $mtoken;
    public $status;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getOpenid()
    {
        return $this->openid;
    }

    public function setOpenid($openid)
    {
        $this->openid = $openid;
        return $this;
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdCategoryAttrModelTrait
{
    // protected $_table = 'ld_category_attr';

    public $id;
    public $shopid;
    public $catid;
    public $attr_name;
    public $attr_type;
    public $attr_vs;
    public $attr_val;
    public $sort;
    public $is_del;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getShopid()
    {
        return $this->shopid;
    }

    public function setShopid($shopid)
    {
        $this->shopid = $shopid;
        return $this;
    }

    public function getCatid()
    {
        return $this->catid;
    }

    public function setCatid($catid)
    {
        $this->catid = $catid;
        return $this;
    }

    public function getAttrName()
    {
        return $this->attr_name;
    }

    public function setAttrName($attrName)
    {
        $this->attr_name = $attrName;
        return $this;
    }

    public function getAttrType()
    {
        return $this->attr_type;
    }

    public function setAttrType($attrType)
    {
        $this->attr_type = $attrType;
        return $this;
    }

    public function getAttrVs()
    {
        return $this->attr_vs;
    }

    public function setAttrVs($attrVs)
    {
        $this->attr_vs = $attrVs;
        return $this;
    }

    public function getAttrVal()
    {
        return $this->attr_val;
    }

    public function setAttrVal($attrVal)
    {
        $this->attr_val = $attrVal;
        return $this;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    public function getIsDel()
    {
        return $this->is_del;
    }

    public function setIsDel($isDel)
    {
        $this->is_del = $isDel;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdCateringModelTrait
{
    // protected $_table = 'ld_catering';

    public $id;
    public $business_token;
    public $serial_num;
    public $title;
    public $pic;
    public $details;
    public $taste;
    public $inventory;
    public $last_num;
    public $recommend;
    public $grounding;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBusinessToken()
    {
        return $this->business_token;
    }

    public function setBusinessToken($businessToken)
    {
        $this->business_token = $businessToken;
        return $this;
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getPic()
    {
        return $this->pic;
    }

    public function setPic($pic)
    {
        $this->pic = $pic;
        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function getTaste()
    {
        return $this->taste;
    }

    public function setTaste($taste)
    {
        $this->taste = $taste;
        return $this;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    public function getLastNum()
    {
        return $this->last_num;
    }

    public function setLastNum($lastNum)
    {
        $this->last_num = $lastNum;
        return $this;
    }

    public function getRecommend()
    {
        return $this->recommend;
    }

    public function setRecommend($recommend)
    {
        $this->recommend = $recommend;
        return $this;
    }

    public function getGrounding()
    {
        return $this->grounding;
    }

    public function setGrounding($grounding)
    {
        $this->grounding = $grounding;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdCateringCategoryModelTrait
{
    // protected $_table = 'ld_catering_category';

    public $id;
    public $serial_num;
    public $categor;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getCategor()
    {
        return $this->categor;
    }

    public function setCategor($categor)
    {
        $this->categor = $categor;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdCateringSpecModelTrait
{
    // protected $_table = 'ld_catering_spec';

    public $id;
    public $serial_num;
    public $catering_desc;
    public $cost_price;
    public $current_price;
    public $inventory;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getCateringDesc()
    {
        return $this->catering_desc;
    }

    public function setCateringDesc($cateringDesc)
    {
        $this->catering_desc = $cateringDesc;
        return $this;
    }

    public function getCostPrice()
    {
        return $this->cost_price;
    }

    public function setCostPrice($costPrice)
    {
        $this->cost_price = $costPrice;
        return $this;
    }

    public function getCurrentPrice()
    {
        return $this->current_price;
    }

    public function setCurrentPrice($currentPrice)
    {
        $this->current_price = $currentPrice;
        return $this;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdCateringTasteModelTrait
{
    // protected $_table = 'ld_catering_taste';

    public $id;
    public $peppery;
    public $hot;
    public $sweet;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getPeppery()
    {
        return $this->peppery;
    }

    public function setPeppery($peppery)
    {
        $this->peppery = $peppery;
        return $this;
    }

    public function getHot()
    {
        return $this->hot;
    }

    public function setHot($hot)
    {
        $this->hot = $hot;
        return $this;
    }

    public function getSweet()
    {
        return $this->sweet;
    }

    public function setSweet($sweet)
    {
        $this->sweet = $sweet;
        return $this;
    }
}

trait LdEshopSalesOrderModelTrait
{
    // protected $_table = 'ld_eshop_sales_order';

    public $id;
    public $oid;
    public $order_type;
    public $mtoken;
    public $m_name;
    public $shop_id;
    public $order_status;
    public $order_is_del;
    public $order_is_del_m;
    public $order_created_at;
    public $order_updated_at;
    public $order_come_from;
    public $order_make_way;
    public $items_quantity;
    public $items_total_weight;
    public $grand_total;
    public $base_grand_total;
    public $discount_total;
    public $payment_method;
    public $payment_status;
    public $txn_id;
    public $payment_created_at;
    public $payment_success_at;
    public $if_is_own_stock;
    public $utoken;
    public $username;
    public $user_type;
    public $order_notes;
    public $order_shipping_method;
    public $order_shipping_id;
    public $order_comment_id;
    public $shipment_id;
    public $version;
    public $user_phone;
    public $is_refund;
    public $refund_remark;
    public $refund_money;
    public $refund_src_status;
    public $refund_created_at;
    public $refund_finish_at;
    public $ship_checked_at;
    public $order_tag;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getOid()
    {
        return $this->oid;
    }

    public function setOid($oid)
    {
        $this->oid = $oid;
        return $this;
    }

    public function getOrderType()
    {
        return $this->order_type;
    }

    public function setOrderType($orderType)
    {
        $this->order_type = $orderType;
        return $this;
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }

    public function getMName()
    {
        return $this->m_name;
    }

    public function setMName($mName)
    {
        $this->m_name = $mName;
        return $this;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setShopId($shopId)
    {
        $this->shop_id = $shopId;
        return $this;
    }

    public function getOrderStatus()
    {
        return $this->order_status;
    }

    public function setOrderStatus($orderStatus)
    {
        $this->order_status = $orderStatus;
        return $this;
    }

    public function getOrderIsDel()
    {
        return $this->order_is_del;
    }

    public function setOrderIsDel($orderIsDel)
    {
        $this->order_is_del = $orderIsDel;
        return $this;
    }

    public function getOrderIsDelM()
    {
        return $this->order_is_del_m;
    }

    public function setOrderIsDelM($orderIsDelM)
    {
        $this->order_is_del_m = $orderIsDelM;
        return $this;
    }

    public function getOrderCreatedAt()
    {
        return $this->order_created_at;
    }

    public function setOrderCreatedAt($orderCreatedAt)
    {
        $this->order_created_at = $orderCreatedAt;
        return $this;
    }

    public function getOrderUpdatedAt()
    {
        return $this->order_updated_at;
    }

    public function setOrderUpdatedAt($orderUpdatedAt)
    {
        $this->order_updated_at = $orderUpdatedAt;
        return $this;
    }

    public function getOrderComeFrom()
    {
        return $this->order_come_from;
    }

    public function setOrderComeFrom($orderComeFrom)
    {
        $this->order_come_from = $orderComeFrom;
        return $this;
    }

    public function getOrderMakeWay()
    {
        return $this->order_make_way;
    }

    public function setOrderMakeWay($orderMakeWay)
    {
        $this->order_make_way = $orderMakeWay;
        return $this;
    }

    public function getItemsQuantity()
    {
        return $this->items_quantity;
    }

    public function setItemsQuantity($itemsQuantity)
    {
        $this->items_quantity = $itemsQuantity;
        return $this;
    }

    public function getItemsTotalWeight()
    {
        return $this->items_total_weight;
    }

    public function setItemsTotalWeight($itemsTotalWeight)
    {
        $this->items_total_weight = $itemsTotalWeight;
        return $this;
    }

    public function getGrandTotal()
    {
        return $this->grand_total;
    }

    public function setGrandTotal($grandTotal)
    {
        $this->grand_total = $grandTotal;
        return $this;
    }

    public function getBaseGrandTotal()
    {
        return $this->base_grand_total;
    }

    public function setBaseGrandTotal($baseGrandTotal)
    {
        $this->base_grand_total = $baseGrandTotal;
        return $this;
    }

    public function getDiscountTotal()
    {
        return $this->discount_total;
    }

    public function setDiscountTotal($discountTotal)
    {
        $this->discount_total = $discountTotal;
        return $this;
    }

    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->payment_method = $paymentMethod;
        return $this;
    }

    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    public function setPaymentStatus($paymentStatus)
    {
        $this->payment_status = $paymentStatus;
        return $this;
    }

    public function getTxnId()
    {
        return $this->txn_id;
    }

    public function setTxnId($txnId)
    {
        $this->txn_id = $txnId;
        return $this;
    }

    public function getPaymentCreatedAt()
    {
        return $this->payment_created_at;
    }

    public function setPaymentCreatedAt($paymentCreatedAt)
    {
        $this->payment_created_at = $paymentCreatedAt;
        return $this;
    }

    public function getPaymentSuccessAt()
    {
        return $this->payment_success_at;
    }

    public function setPaymentSuccessAt($paymentSuccessAt)
    {
        $this->payment_success_at = $paymentSuccessAt;
        return $this;
    }

    public function getIfIsOwnStock()
    {
        return $this->if_is_own_stock;
    }

    public function setIfIsOwnStock($ifIsOwnStock)
    {
        $this->if_is_own_stock = $ifIsOwnStock;
        return $this;
    }

    public function getUtoken()
    {
        return $this->utoken;
    }

    public function setUtoken($utoken)
    {
        $this->utoken = $utoken;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getUserType()
    {
        return $this->user_type;
    }

    public function setUserType($userType)
    {
        $this->user_type = $userType;
        return $this;
    }

    public function getOrderNotes()
    {
        return $this->order_notes;
    }

    public function setOrderNotes($orderNotes)
    {
        $this->order_notes = $orderNotes;
        return $this;
    }

    public function getOrderShippingMethod()
    {
        return $this->order_shipping_method;
    }

    public function setOrderShippingMethod($orderShippingMethod)
    {
        $this->order_shipping_method = $orderShippingMethod;
        return $this;
    }

    public function getOrderShippingId()
    {
        return $this->order_shipping_id;
    }

    public function setOrderShippingId($orderShippingId)
    {
        $this->order_shipping_id = $orderShippingId;
        return $this;
    }

    public function getOrderCommentId()
    {
        return $this->order_comment_id;
    }

    public function setOrderCommentId($orderCommentId)
    {
        $this->order_comment_id = $orderCommentId;
        return $this;
    }

    public function getShipmentId()
    {
        return $this->shipment_id;
    }

    public function setShipmentId($shipmentId)
    {
        $this->shipment_id = $shipmentId;
        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    public function getUserPhone()
    {
        return $this->user_phone;
    }

    public function setUserPhone($userPhone)
    {
        $this->user_phone = $userPhone;
        return $this;
    }

    public function getIsRefund()
    {
        return $this->is_refund;
    }

    public function setIsRefund($isRefund)
    {
        $this->is_refund = $isRefund;
        return $this;
    }

    public function getRefundRemark()
    {
        return $this->refund_remark;
    }

    public function setRefundRemark($refundRemark)
    {
        $this->refund_remark = $refundRemark;
        return $this;
    }

    public function getRefundMoney()
    {
        return $this->refund_money;
    }

    public function setRefundMoney($refundMoney)
    {
        $this->refund_money = $refundMoney;
        return $this;
    }

    public function getRefundSrcStatus()
    {
        return $this->refund_src_status;
    }

    public function setRefundSrcStatus($refundSrcStatus)
    {
        $this->refund_src_status = $refundSrcStatus;
        return $this;
    }

    public function getRefundCreatedAt()
    {
        return $this->refund_created_at;
    }

    public function setRefundCreatedAt($refundCreatedAt)
    {
        $this->refund_created_at = $refundCreatedAt;
        return $this;
    }

    public function getRefundFinishAt()
    {
        return $this->refund_finish_at;
    }

    public function setRefundFinishAt($refundFinishAt)
    {
        $this->refund_finish_at = $refundFinishAt;
        return $this;
    }

    public function getShipCheckedAt()
    {
        return $this->ship_checked_at;
    }

    public function setShipCheckedAt($shipCheckedAt)
    {
        $this->ship_checked_at = $shipCheckedAt;
        return $this;
    }

    public function getOrderTag()
    {
        return $this->order_tag;
    }

    public function setOrderTag($orderTag)
    {
        $this->order_tag = $orderTag;
        return $this;
    }
}

trait LdEshopSalesOrderExtendModelTrait
{
    // protected $_table = 'ld_eshop_sales_order_extend';

    public $id;
    public $oid;
    public $order_created_ip;
    public $order_created_lat;
    public $order_created_lng;
    public $order_created_address;
    public $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getOid()
    {
        return $this->oid;
    }

    public function setOid($oid)
    {
        $this->oid = $oid;
        return $this;
    }

    public function getOrderCreatedIp()
    {
        return $this->order_created_ip;
    }

    public function setOrderCreatedIp($orderCreatedIp)
    {
        $this->order_created_ip = $orderCreatedIp;
        return $this;
    }

    public function getOrderCreatedLat()
    {
        return $this->order_created_lat;
    }

    public function setOrderCreatedLat($orderCreatedLat)
    {
        $this->order_created_lat = $orderCreatedLat;
        return $this;
    }

    public function getOrderCreatedLng()
    {
        return $this->order_created_lng;
    }

    public function setOrderCreatedLng($orderCreatedLng)
    {
        $this->order_created_lng = $orderCreatedLng;
        return $this;
    }

    public function getOrderCreatedAddress()
    {
        return $this->order_created_address;
    }

    public function setOrderCreatedAddress($orderCreatedAddress)
    {
        $this->order_created_address = $orderCreatedAddress;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
}

trait LdEshopSalesOrderItemsModelTrait
{
    // protected $_table = 'ld_eshop_sales_order_items';

    public $id;
    public $order_id;
    public $oid;
    public $shop_id;
    public $mtoken;
    public $m_name;
    public $spu_id;
    public $sku_id;
    public $custom_option_sku;
    public $goods_name;
    public $goods_show_pic;
    public $goods_quantity;
    public $goods_unit;
    public $goods_unit_price;
    public $goods_grand_total;
    public $goods_discount_total;
    public $goods_base_grand_total;
    public $is_gift;
    public $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;
        return $this;
    }

    public function getOid()
    {
        return $this->oid;
    }

    public function setOid($oid)
    {
        $this->oid = $oid;
        return $this;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setShopId($shopId)
    {
        $this->shop_id = $shopId;
        return $this;
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }

    public function getMName()
    {
        return $this->m_name;
    }

    public function setMName($mName)
    {
        $this->m_name = $mName;
        return $this;
    }

    public function getSpuId()
    {
        return $this->spu_id;
    }

    public function setSpuId($spuId)
    {
        $this->spu_id = $spuId;
        return $this;
    }

    public function getSkuId()
    {
        return $this->sku_id;
    }

    public function setSkuId($skuId)
    {
        $this->sku_id = $skuId;
        return $this;
    }

    public function getCustomOptionSku()
    {
        return $this->custom_option_sku;
    }

    public function setCustomOptionSku($customOptionSku)
    {
        $this->custom_option_sku = $customOptionSku;
        return $this;
    }

    public function getGoodsName()
    {
        return $this->goods_name;
    }

    public function setGoodsName($goodsName)
    {
        $this->goods_name = $goodsName;
        return $this;
    }

    public function getGoodsShowPic()
    {
        return $this->goods_show_pic;
    }

    public function setGoodsShowPic($goodsShowPic)
    {
        $this->goods_show_pic = $goodsShowPic;
        return $this;
    }

    public function getGoodsQuantity()
    {
        return $this->goods_quantity;
    }

    public function setGoodsQuantity($goodsQuantity)
    {
        $this->goods_quantity = $goodsQuantity;
        return $this;
    }

    public function getGoodsUnit()
    {
        return $this->goods_unit;
    }

    public function setGoodsUnit($goodsUnit)
    {
        $this->goods_unit = $goodsUnit;
        return $this;
    }

    public function getGoodsUnitPrice()
    {
        return $this->goods_unit_price;
    }

    public function setGoodsUnitPrice($goodsUnitPrice)
    {
        $this->goods_unit_price = $goodsUnitPrice;
        return $this;
    }

    public function getGoodsGrandTotal()
    {
        return $this->goods_grand_total;
    }

    public function setGoodsGrandTotal($goodsGrandTotal)
    {
        $this->goods_grand_total = $goodsGrandTotal;
        return $this;
    }

    public function getGoodsDiscountTotal()
    {
        return $this->goods_discount_total;
    }

    public function setGoodsDiscountTotal($goodsDiscountTotal)
    {
        $this->goods_discount_total = $goodsDiscountTotal;
        return $this;
    }

    public function getGoodsBaseGrandTotal()
    {
        return $this->goods_base_grand_total;
    }

    public function setGoodsBaseGrandTotal($goodsBaseGrandTotal)
    {
        $this->goods_base_grand_total = $goodsBaseGrandTotal;
        return $this;
    }

    public function getIsGift()
    {
        return $this->is_gift;
    }

    public function setIsGift($isGift)
    {
        $this->is_gift = $isGift;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
}

trait LdIndustryCategoryModelTrait
{
    // protected $_table = 'ld_industry_category';

    public $id;
    public $name;
    public $remark;
    public $sort;
    public $is_del;
    public $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
        return $this;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    public function getIsDel()
    {
        return $this->is_del;
    }

    public function setIsDel($isDel)
    {
        $this->is_del = $isDel;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
}

trait LdLogisticsInfoModelTrait
{
    // protected $_table = 'ld_logistics_info';

    public $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }
}

trait LdMallInfoModelTrait
{
    // protected $_table = 'ld_mall_info';

    public $id;
    public $bid;
    public $name;
    public $mall_imgurl;
    public $industry_id;
    public $mall_type;
    public $good_type;
    public $server_number;
    public $province;
    public $city;
    public $country;
    public $address;
    public $tag_info;
    public $hours;
    public $status;
    public $created_at;
    public $updated_at;
    public $mtoken;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getMallImgurl()
    {
        return $this->mall_imgurl;
    }

    public function setMallImgurl($mallImgurl)
    {
        $this->mall_imgurl = $mallImgurl;
        return $this;
    }

    public function getIndustryId()
    {
        return $this->industry_id;
    }

    public function setIndustryId($industryId)
    {
        $this->industry_id = $industryId;
        return $this;
    }

    public function getMallType()
    {
        return $this->mall_type;
    }

    public function setMallType($mallType)
    {
        $this->mall_type = $mallType;
        return $this;
    }

    public function getGoodType()
    {
        return $this->good_type;
    }

    public function setGoodType($goodType)
    {
        $this->good_type = $goodType;
        return $this;
    }

    public function getServerNumber()
    {
        return $this->server_number;
    }

    public function setServerNumber($serverNumber)
    {
        $this->server_number = $serverNumber;
        return $this;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getTagInfo()
    {
        return $this->tag_info;
    }

    public function setTagInfo($tagInfo)
    {
        $this->tag_info = $tagInfo;
        return $this;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function setHours($hours)
    {
        $this->hours = $hours;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }
}

trait LdMallTagModelTrait
{
    // protected $_table = 'ld_mall_tag';

    public $id;
    public $name;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

trait LdMessagesStoreModelTrait
{
    // protected $_table = 'ld_messages_store';

    public $id;
    public $title;
    public $content;
    public $custom;
    public $publisher_id;
    public $receive_id;
    public $status;
    public $weight;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCustom()
    {
        return $this->custom;
    }

    public function setCustom($custom)
    {
        $this->custom = $custom;
        return $this;
    }

    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    public function setPublisherId($publisherId)
    {
        $this->publisher_id = $publisherId;
        return $this;
    }

    /**
     * @param $publisherId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByPublisherId($publisherId)
    {
        return static::findSimple([
            'publisher_id' => $publisherId,
        ]);
    }

    /**
     * @param $publisherId
     * @return static|false
     */
    public static function findFirstByPublisherId($publisherId)
    {
        return static::findFirstSimple([
            'publisher_id' => $publisherId,
        ]);
    }

    public function getReceiveId()
    {
        return $this->receive_id;
    }

    public function setReceiveId($receiveId)
    {
        $this->receive_id = $receiveId;
        return $this;
    }

    /**
     * @param $receiveId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByReceiveId($receiveId)
    {
        return static::findSimple([
            'receive_id' => $receiveId,
        ]);
    }

    /**
     * @param $receiveId
     * @return static|false
     */
    public static function findFirstByReceiveId($receiveId)
    {
        return static::findFirstSimple([
            'receive_id' => $receiveId,
        ]);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param $status
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByStatus($status)
    {
        return static::findSimple([
            'status' => $status,
        ]);
    }

    /**
     * @param $status
     * @return static|false
     */
    public static function findFirstByStatus($status)
    {
        return static::findFirstSimple([
            'status' => $status,
        ]);
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param $weight
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByWeight($weight)
    {
        return static::findSimple([
            'weight' => $weight,
        ]);
    }

    /**
     * @param $weight
     * @return static|false
     */
    public static function findFirstByWeight($weight)
    {
        return static::findFirstSimple([
            'weight' => $weight,
        ]);
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdMessagesSystemModelTrait
{
    // protected $_table = 'ld_messages_system';

    public $id;
    public $title;
    public $titlepic;
    public $describe;
    public $content;
    public $custom;
    public $publisher_id;
    public $receive_id;
    public $visibility;
    public $password;
    public $read_number;
    public $status;
    public $weight;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitlepic()
    {
        return $this->titlepic;
    }

    public function setTitlepic($titlepic)
    {
        $this->titlepic = $titlepic;
        return $this;
    }

    public function getDescribe()
    {
        return $this->describe;
    }

    public function setDescribe($describe)
    {
        $this->describe = $describe;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCustom()
    {
        return $this->custom;
    }

    public function setCustom($custom)
    {
        $this->custom = $custom;
        return $this;
    }

    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    public function setPublisherId($publisherId)
    {
        $this->publisher_id = $publisherId;
        return $this;
    }

    /**
     * @param $publisherId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByPublisherId($publisherId)
    {
        return static::findSimple([
            'publisher_id' => $publisherId,
        ]);
    }

    /**
     * @param $publisherId
     * @return static|false
     */
    public static function findFirstByPublisherId($publisherId)
    {
        return static::findFirstSimple([
            'publisher_id' => $publisherId,
        ]);
    }

    public function getReceiveId()
    {
        return $this->receive_id;
    }

    public function setReceiveId($receiveId)
    {
        $this->receive_id = $receiveId;
        return $this;
    }

    /**
     * @param $receiveId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByReceiveId($receiveId)
    {
        return static::findSimple([
            'receive_id' => $receiveId,
        ]);
    }

    /**
     * @param $receiveId
     * @return static|false
     */
    public static function findFirstByReceiveId($receiveId)
    {
        return static::findFirstSimple([
            'receive_id' => $receiveId,
        ]);
    }

    public function getVisibility()
    {
        return $this->visibility;
    }

    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getReadNumber()
    {
        return $this->read_number;
    }

    public function setReadNumber($readNumber)
    {
        $this->read_number = $readNumber;
        return $this;
    }

    /**
     * @param $readNumber
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByReadNumber($readNumber)
    {
        return static::findSimple([
            'read_number' => $readNumber,
        ]);
    }

    /**
     * @param $readNumber
     * @return static|false
     */
    public static function findFirstByReadNumber($readNumber)
    {
        return static::findFirstSimple([
            'read_number' => $readNumber,
        ]);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param $status
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByStatus($status)
    {
        return static::findSimple([
            'status' => $status,
        ]);
    }

    /**
     * @param $status
     * @return static|false
     */
    public static function findFirstByStatus($status)
    {
        return static::findFirstSimple([
            'status' => $status,
        ]);
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param $weight
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByWeight($weight)
    {
        return static::findSimple([
            'weight' => $weight,
        ]);
    }

    /**
     * @param $weight
     * @return static|false
     */
    public static function findFirstByWeight($weight)
    {
        return static::findFirstSimple([
            'weight' => $weight,
        ]);
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdProductAttrModelTrait
{
    // protected $_table = 'ld_product_attr';

    public $id;
    public $shopid;
    public $catid;
    public $attr_name;
    public $attr_json;
    public $is_del;
    public $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getShopid()
    {
        return $this->shopid;
    }

    public function setShopid($shopid)
    {
        $this->shopid = $shopid;
        return $this;
    }

    public function getCatid()
    {
        return $this->catid;
    }

    public function setCatid($catid)
    {
        $this->catid = $catid;
        return $this;
    }

    public function getAttrName()
    {
        return $this->attr_name;
    }

    public function setAttrName($attrName)
    {
        $this->attr_name = $attrName;
        return $this;
    }

    public function getAttrJson()
    {
        return $this->attr_json;
    }

    public function setAttrJson($attrJson)
    {
        $this->attr_json = $attrJson;
        return $this;
    }

    public function getIsDel()
    {
        return $this->is_del;
    }

    public function setIsDel($isDel)
    {
        $this->is_del = $isDel;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
}

trait LdProductSkuModelTrait
{
    // protected $_table = 'ld_product_sku';

    public $id;
    public $product_uuid;
    public $shopid;
    public $attr_id;
    public $attr_val;
    public $product_unit;
    public $price_current;
    public $price_original;
    public $attr_stock;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getProductUuid()
    {
        return $this->product_uuid;
    }

    public function setProductUuid($productUuid)
    {
        $this->product_uuid = $productUuid;
        return $this;
    }

    public function getShopid()
    {
        return $this->shopid;
    }

    public function setShopid($shopid)
    {
        $this->shopid = $shopid;
        return $this;
    }

    public function getAttrId()
    {
        return $this->attr_id;
    }

    public function setAttrId($attrId)
    {
        $this->attr_id = $attrId;
        return $this;
    }

    public function getAttrVal()
    {
        return $this->attr_val;
    }

    public function setAttrVal($attrVal)
    {
        $this->attr_val = $attrVal;
        return $this;
    }

    public function getProductUnit()
    {
        return $this->product_unit;
    }

    public function setProductUnit($productUnit)
    {
        $this->product_unit = $productUnit;
        return $this;
    }

    public function getPriceCurrent()
    {
        return $this->price_current;
    }

    public function setPriceCurrent($priceCurrent)
    {
        $this->price_current = $priceCurrent;
        return $this;
    }

    public function getPriceOriginal()
    {
        return $this->price_original;
    }

    public function setPriceOriginal($priceOriginal)
    {
        $this->price_original = $priceOriginal;
        return $this;
    }

    public function getAttrStock()
    {
        return $this->attr_stock;
    }

    public function setAttrStock($attrStock)
    {
        $this->attr_stock = $attrStock;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdProductsModelTrait
{
    // protected $_table = 'ld_products';

    public $id;
    public $product_uuid;
    public $mtoken;
    public $cate_id;
    public $shop_id;
    public $spec_type;
    public $product_name;
    public $price_market;
    public $product_stock;
    public $product_unit;
    public $is_sale;
    public $is_recommend;
    public $is_index_recommend;
    public $is_book;
    public $is_hot;
    public $is_del;
    public $product_desc;
    public $status;
    public $status_remark;
    public $product_key_words;
    public $product_pic_thumbnail;
    public $product_pic;
    public $product_pic_detail;
    public $saleCount;
    public $bookQuantity;
    public $sale_time;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getProductUuid()
    {
        return $this->product_uuid;
    }

    public function setProductUuid($productUuid)
    {
        $this->product_uuid = $productUuid;
        return $this;
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }

    public function getCateId()
    {
        return $this->cate_id;
    }

    public function setCateId($cateId)
    {
        $this->cate_id = $cateId;
        return $this;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setShopId($shopId)
    {
        $this->shop_id = $shopId;
        return $this;
    }

    public function getSpecType()
    {
        return $this->spec_type;
    }

    public function setSpecType($specType)
    {
        $this->spec_type = $specType;
        return $this;
    }

    public function getProductName()
    {
        return $this->product_name;
    }

    public function setProductName($productName)
    {
        $this->product_name = $productName;
        return $this;
    }

    public function getPriceMarket()
    {
        return $this->price_market;
    }

    public function setPriceMarket($priceMarket)
    {
        $this->price_market = $priceMarket;
        return $this;
    }

    public function getProductStock()
    {
        return $this->product_stock;
    }

    public function setProductStock($productStock)
    {
        $this->product_stock = $productStock;
        return $this;
    }

    public function getProductUnit()
    {
        return $this->product_unit;
    }

    public function setProductUnit($productUnit)
    {
        $this->product_unit = $productUnit;
        return $this;
    }

    public function getIsSale()
    {
        return $this->is_sale;
    }

    public function setIsSale($isSale)
    {
        $this->is_sale = $isSale;
        return $this;
    }

    public function getIsRecommend()
    {
        return $this->is_recommend;
    }

    public function setIsRecommend($isRecommend)
    {
        $this->is_recommend = $isRecommend;
        return $this;
    }

    public function getIsIndexRecommend()
    {
        return $this->is_index_recommend;
    }

    public function setIsIndexRecommend($isIndexRecommend)
    {
        $this->is_index_recommend = $isIndexRecommend;
        return $this;
    }

    public function getIsBook()
    {
        return $this->is_book;
    }

    public function setIsBook($isBook)
    {
        $this->is_book = $isBook;
        return $this;
    }

    public function getIsHot()
    {
        return $this->is_hot;
    }

    public function setIsHot($isHot)
    {
        $this->is_hot = $isHot;
        return $this;
    }

    public function getIsDel()
    {
        return $this->is_del;
    }

    public function setIsDel($isDel)
    {
        $this->is_del = $isDel;
        return $this;
    }

    public function getProductDesc()
    {
        return $this->product_desc;
    }

    public function setProductDesc($productDesc)
    {
        $this->product_desc = $productDesc;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusRemark()
    {
        return $this->status_remark;
    }

    public function setStatusRemark($statusRemark)
    {
        $this->status_remark = $statusRemark;
        return $this;
    }

    public function getProductKeyWords()
    {
        return $this->product_key_words;
    }

    public function setProductKeyWords($productKeyWords)
    {
        $this->product_key_words = $productKeyWords;
        return $this;
    }

    public function getProductPicThumbnail()
    {
        return $this->product_pic_thumbnail;
    }

    public function setProductPicThumbnail($productPicThumbnail)
    {
        $this->product_pic_thumbnail = $productPicThumbnail;
        return $this;
    }

    public function getProductPic()
    {
        return $this->product_pic;
    }

    public function setProductPic($productPic)
    {
        $this->product_pic = $productPic;
        return $this;
    }

    public function getProductPicDetail()
    {
        return $this->product_pic_detail;
    }

    public function setProductPicDetail($productPicDetail)
    {
        $this->product_pic_detail = $productPicDetail;
        return $this;
    }

    public function getSalecount()
    {
        return $this->saleCount;
    }

    public function setSalecount($salecount)
    {
        $this->saleCount = $salecount;
        return $this;
    }

    public function getBookquantity()
    {
        return $this->bookQuantity;
    }

    public function setBookquantity($bookquantity)
    {
        $this->bookQuantity = $bookquantity;
        return $this;
    }

    public function getSaleTime()
    {
        return $this->sale_time;
    }

    public function setSaleTime($saleTime)
    {
        $this->sale_time = $saleTime;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait LdProductsCatsModelTrait
{
    // protected $_table = 'ld_products_cats';

    public $id;
    public $shopid;
    public $mtoken;
    public $pid;
    public $industry_id;
    public $level;
    public $catName;
    public $sort;
    public $is_del;
    public $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getShopid()
    {
        return $this->shopid;
    }

    public function setShopid($shopid)
    {
        $this->shopid = $shopid;
        return $this;
    }

    public function getMtoken()
    {
        return $this->mtoken;
    }

    public function setMtoken($mtoken)
    {
        $this->mtoken = $mtoken;
        return $this;
    }

    public function getPid()
    {
        return $this->pid;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;
        return $this;
    }

    public function getIndustryId()
    {
        return $this->industry_id;
    }

    public function setIndustryId($industryId)
    {
        $this->industry_id = $industryId;
        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    public function getCatname()
    {
        return $this->catName;
    }

    public function setCatname($catname)
    {
        $this->catName = $catname;
        return $this;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    public function getIsDel()
    {
        return $this->is_del;
    }

    public function setIsDel($isDel)
    {
        $this->is_del = $isDel;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
}

trait LdRetailModelTrait
{
    // protected $_table = 'ld_retail';

    public $id;
    public $business_token;
    public $serial_num;
    public $title;
    public $pic;
    public $details;
    public $inventory;
    public $last_num;
    public $desc_pics;
    public $recommend;
    public $grounding;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getBusinessToken()
    {
        return $this->business_token;
    }

    public function setBusinessToken($businessToken)
    {
        $this->business_token = $businessToken;
        return $this;
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getPic()
    {
        return $this->pic;
    }

    public function setPic($pic)
    {
        $this->pic = $pic;
        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    public function getLastNum()
    {
        return $this->last_num;
    }

    public function setLastNum($lastNum)
    {
        $this->last_num = $lastNum;
        return $this;
    }

    public function getDescPics()
    {
        return $this->desc_pics;
    }

    public function setDescPics($descPics)
    {
        $this->desc_pics = $descPics;
        return $this;
    }

    public function getRecommend()
    {
        return $this->recommend;
    }

    public function setRecommend($recommend)
    {
        $this->recommend = $recommend;
        return $this;
    }

    public function getGrounding()
    {
        return $this->grounding;
    }

    public function setGrounding($grounding)
    {
        $this->grounding = $grounding;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdRetailCategoryModelTrait
{
    // protected $_table = 'ld_retail_category';

    public $id;
    public $serial_num;
    public $categor;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getCategor()
    {
        return $this->categor;
    }

    public function setCategor($categor)
    {
        $this->categor = $categor;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdRetailSpecModelTrait
{
    // protected $_table = 'ld_retail_spec';

    public $id;
    public $serial_num;
    public $retail_desc;
    public $cost_price;
    public $current_price;
    public $inventory;
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getSerialNum()
    {
        return $this->serial_num;
    }

    public function setSerialNum($serialNum)
    {
        $this->serial_num = $serialNum;
        return $this;
    }

    public function getRetailDesc()
    {
        return $this->retail_desc;
    }

    public function setRetailDesc($retailDesc)
    {
        $this->retail_desc = $retailDesc;
        return $this;
    }

    public function getCostPrice()
    {
        return $this->cost_price;
    }

    public function setCostPrice($costPrice)
    {
        $this->cost_price = $costPrice;
        return $this;
    }

    public function getCurrentPrice()
    {
        return $this->current_price;
    }

    public function setCurrentPrice($currentPrice)
    {
        $this->current_price = $currentPrice;
        return $this;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

trait LdSystemPayConfigModelTrait
{
    // protected $_table = 'ld_system_pay_config';

    public $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }
}

trait MigrationsModelTrait
{
    // protected $_table = 'migrations';

    public $file;
    public $run_at;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @param $file
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByFile($file)
    {
        return static::findSimple([
            'file' => $file,
        ]);
    }

    /**
     * @param $file
     * @return static|false
     */
    public static function findFirstByFile($file)
    {
        return static::findFirstSimple([
            'file' => $file,
        ]);
    }

    public function getRunAt()
    {
        return $this->run_at;
    }

    public function setRunAt($runAt)
    {
        $this->run_at = $runAt;
        return $this;
    }
}

trait OrderDataModelTrait
{
    // protected $_table = 'order_data';

    public $order_id;
    public $request_data;
    public $data;
    public $status_history;

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;
        return $this;
    }

    /**
     * @param $orderId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByOrderId($orderId)
    {
        return static::findSimple([
            'order_id' => $orderId,
        ]);
    }

    /**
     * @param $orderId
     * @return static|false
     */
    public static function findFirstByOrderId($orderId)
    {
        return static::findFirstSimple([
            'order_id' => $orderId,
        ]);
    }

    public function getRequestData()
    {
        return $this->request_data;
    }

    public function setRequestData($requestData)
    {
        $this->request_data = $requestData;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getStatusHistory()
    {
        return $this->status_history;
    }

    public function setStatusHistory($statusHistory)
    {
        $this->status_history = $statusHistory;
        return $this;
    }
}

trait OrdersModelTrait
{
    // protected $_table = 'orders';

    public $id;
    public $prefixed_order_id;
    public $trade_id;
    public $txn_id;
    public $product_name;
    public $user_identifier;
    public $username;
    public $client_id;
    public $payment_gateway;
    public $payment_method;
    public $amount;
    public $discount_amount;
    public $cash_to_pay;
    public $cash_paid;
    public $currency;
    public $amount_in_currency;
    public $status;
    public $created_at;
    public $completed_at;
    public $canceled_at;
    public $failed_at;
    public $callback_url;
    public $callback_status;
    public $callback_next_retry;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getPrefixedOrderId()
    {
        return $this->prefixed_order_id;
    }

    public function setPrefixedOrderId($prefixedOrderId)
    {
        $this->prefixed_order_id = $prefixedOrderId;
        return $this;
    }

    /**
     * @param $prefixedOrderId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByPrefixedOrderId($prefixedOrderId)
    {
        return static::findSimple([
            'prefixed_order_id' => $prefixedOrderId,
        ]);
    }

    /**
     * @param $prefixedOrderId
     * @return static|false
     */
    public static function findFirstByPrefixedOrderId($prefixedOrderId)
    {
        return static::findFirstSimple([
            'prefixed_order_id' => $prefixedOrderId,
        ]);
    }

    public function getTradeId()
    {
        return $this->trade_id;
    }

    public function setTradeId($tradeId)
    {
        $this->trade_id = $tradeId;
        return $this;
    }

    /**
     * @param $tradeId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByTradeId($tradeId)
    {
        return static::findSimple([
            'trade_id' => $tradeId,
        ]);
    }

    /**
     * @param $tradeId
     * @return static|false
     */
    public static function findFirstByTradeId($tradeId)
    {
        return static::findFirstSimple([
            'trade_id' => $tradeId,
        ]);
    }

    public function getTxnId()
    {
        return $this->txn_id;
    }

    public function setTxnId($txnId)
    {
        $this->txn_id = $txnId;
        return $this;
    }

    public function getProductName()
    {
        return $this->product_name;
    }

    public function setProductName($productName)
    {
        $this->product_name = $productName;
        return $this;
    }

    public function getUserIdentifier()
    {
        return $this->user_identifier;
    }

    public function setUserIdentifier($userIdentifier)
    {
        $this->user_identifier = $userIdentifier;
        return $this;
    }

    /**
     * @param $userIdentifier
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByUserIdentifier($userIdentifier)
    {
        return static::findSimple([
            'user_identifier' => $userIdentifier,
        ]);
    }

    /**
     * @param $userIdentifier
     * @return static|false
     */
    public static function findFirstByUserIdentifier($userIdentifier)
    {
        return static::findFirstSimple([
            'user_identifier' => $userIdentifier,
        ]);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($clientId)
    {
        $this->client_id = $clientId;
        return $this;
    }

    public function getPaymentGateway()
    {
        return $this->payment_gateway;
    }

    public function setPaymentGateway($paymentGateway)
    {
        $this->payment_gateway = $paymentGateway;
        return $this;
    }

    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->payment_method = $paymentMethod;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDiscountAmount()
    {
        return $this->discount_amount;
    }

    public function setDiscountAmount($discountAmount)
    {
        $this->discount_amount = $discountAmount;
        return $this;
    }

    public function getCashToPay()
    {
        return $this->cash_to_pay;
    }

    public function setCashToPay($cashToPay)
    {
        $this->cash_to_pay = $cashToPay;
        return $this;
    }

    public function getCashPaid()
    {
        return $this->cash_paid;
    }

    public function setCashPaid($cashPaid)
    {
        $this->cash_paid = $cashPaid;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getAmountInCurrency()
    {
        return $this->amount_in_currency;
    }

    public function setAmountInCurrency($amountInCurrency)
    {
        $this->amount_in_currency = $amountInCurrency;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getCompletedAt()
    {
        return $this->completed_at;
    }

    public function setCompletedAt($completedAt)
    {
        $this->completed_at = $completedAt;
        return $this;
    }

    public function getCanceledAt()
    {
        return $this->canceled_at;
    }

    public function setCanceledAt($canceledAt)
    {
        $this->canceled_at = $canceledAt;
        return $this;
    }

    public function getFailedAt()
    {
        return $this->failed_at;
    }

    public function setFailedAt($failedAt)
    {
        $this->failed_at = $failedAt;
        return $this;
    }

    public function getCallbackUrl()
    {
        return $this->callback_url;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callback_url = $callbackUrl;
        return $this;
    }

    public function getCallbackStatus()
    {
        return $this->callback_status;
    }

    public function setCallbackStatus($callbackStatus)
    {
        $this->callback_status = $callbackStatus;
        return $this;
    }

    public function getCallbackNextRetry()
    {
        return $this->callback_next_retry;
    }

    public function setCallbackNextRetry($callbackNextRetry)
    {
        $this->callback_next_retry = $callbackNextRetry;
        return $this;
    }
}

trait SsoSitesModelTrait
{
    // protected $_table = 'sso_sites';

    public $id;
    public $site_name;
    public $site_url;
    public $site_secret;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getSiteName()
    {
        return $this->site_name;
    }

    public function setSiteName($siteName)
    {
        $this->site_name = $siteName;
        return $this;
    }

    public function getSiteUrl()
    {
        return $this->site_url;
    }

    public function setSiteUrl($siteUrl)
    {
        $this->site_url = $siteUrl;
        return $this;
    }

    public function getSiteSecret()
    {
        return $this->site_secret;
    }

    public function setSiteSecret($siteSecret)
    {
        $this->site_secret = $siteSecret;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

trait UserProfileModelTrait
{
    // protected $_table = 'user_profile';

    public $user_id;
    public $real_name;
    public $avatar;
    public $remember_token;
    public $extra_data;

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * @param $userId
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByUserId($userId)
    {
        return static::findSimple([
            'user_id' => $userId,
        ]);
    }

    /**
     * @param $userId
     * @return static|false
     */
    public static function findFirstByUserId($userId)
    {
        return static::findFirstSimple([
            'user_id' => $userId,
        ]);
    }

    public function getRealName()
    {
        return $this->real_name;
    }

    public function setRealName($realName)
    {
        $this->real_name = $realName;
        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($rememberToken)
    {
        $this->remember_token = $rememberToken;
        return $this;
    }

    public function getExtraData()
    {
        return $this->extra_data;
    }

    public function setExtraData($extraData)
    {
        $this->extra_data = $extraData;
        return $this;
    }
}

trait UsersModelTrait
{
    // protected $_table = 'users';

    public $id;
    public $username;
    public $email;
    public $mobile;
    public $password;
    public $confirmed;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $id
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findById($id)
    {
        return static::findSimple([
            'id' => $id,
        ]);
    }

    /**
     * @param $id
     * @return static|false
     */
    public static function findFirstById($id)
    {
        return static::findFirstSimple([
            'id' => $id,
        ]);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param $username
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByUsername($username)
    {
        return static::findSimple([
            'username' => $username,
        ]);
    }

    /**
     * @param $username
     * @return static|false
     */
    public static function findFirstByUsername($username)
    {
        return static::findFirstSimple([
            'username' => $username,
        ]);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param $email
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByEmail($email)
    {
        return static::findSimple([
            'email' => $email,
        ]);
    }

    /**
     * @param $email
     * @return static|false
     */
    public static function findFirstByEmail($email)
    {
        return static::findFirstSimple([
            'email' => $email,
        ]);
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @param $mobile
     * @return static[]|\Phalcon\Mvc\Model\Resultset\Simple
     */
    public static function findByMobile($mobile)
    {
        return static::findSimple([
            'mobile' => $mobile,
        ]);
    }

    /**
     * @param $mobile
     * @return static|false
     */
    public static function findFirstByMobile($mobile)
    {
        return static::findFirstSimple([
            'mobile' => $mobile,
        ]);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getConfirmed()
    {
        return $this->confirmed;
    }

    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
}

<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/smart_campaign_setting.proto

namespace Google\Ads\GoogleAds\V18\Resources\SmartCampaignSetting;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Phone number and country code in smart campaign settings.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.SmartCampaignSetting.PhoneNumber</code>
 */
class PhoneNumber extends \Google\Protobuf\Internal\Message
{
    /**
     * Phone number of the smart campaign.
     *
     * Generated from protobuf field <code>optional string phone_number = 1;</code>
     */
    protected $phone_number = null;
    /**
     * Upper-case, two-letter country code as defined by ISO-3166.
     *
     * Generated from protobuf field <code>optional string country_code = 2;</code>
     */
    protected $country_code = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $phone_number
     *           Phone number of the smart campaign.
     *     @type string $country_code
     *           Upper-case, two-letter country code as defined by ISO-3166.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\SmartCampaignSetting::initOnce();
        parent::__construct($data);
    }

    /**
     * Phone number of the smart campaign.
     *
     * Generated from protobuf field <code>optional string phone_number = 1;</code>
     * @return string
     */
    public function getPhoneNumber()
    {
        return isset($this->phone_number) ? $this->phone_number : '';
    }

    public function hasPhoneNumber()
    {
        return isset($this->phone_number);
    }

    public function clearPhoneNumber()
    {
        unset($this->phone_number);
    }

    /**
     * Phone number of the smart campaign.
     *
     * Generated from protobuf field <code>optional string phone_number = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPhoneNumber($var)
    {
        GPBUtil::checkString($var, True);
        $this->phone_number = $var;

        return $this;
    }

    /**
     * Upper-case, two-letter country code as defined by ISO-3166.
     *
     * Generated from protobuf field <code>optional string country_code = 2;</code>
     * @return string
     */
    public function getCountryCode()
    {
        return isset($this->country_code) ? $this->country_code : '';
    }

    public function hasCountryCode()
    {
        return isset($this->country_code);
    }

    public function clearCountryCode()
    {
        unset($this->country_code);
    }

    /**
     * Upper-case, two-letter country code as defined by ISO-3166.
     *
     * Generated from protobuf field <code>optional string country_code = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCountryCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->country_code = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhoneNumber::class, \Google\Ads\GoogleAds\V18\Resources\SmartCampaignSetting_PhoneNumber::class);


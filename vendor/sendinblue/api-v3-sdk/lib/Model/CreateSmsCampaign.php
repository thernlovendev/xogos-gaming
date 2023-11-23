<?php
/**
 * CreateSmsCampaign
 *
 * PHP version 5
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * SendinBlue API
 *
 * SendinBlue provide a RESTFul API that can be used with any languages. With this API, you will be able to :   - Manage your campaigns and get the statistics   - Manage your contacts   - Send transactional Emails and SMS   - and much more...  You can download our wrappers at https://github.com/orgs/sendinblue  **Possible responses**   | Code | Message |   | :-------------: | ------------- |   | 200  | OK. Successful Request  |   | 201  | OK. Successful Creation |   | 202  | OK. Request accepted |   | 204  | OK. Successful Update/Deletion  |   | 400  | Error. Bad Request  |   | 401  | Error. Authentication Needed  |   | 402  | Error. Not enough credit, plan upgrade needed  |   | 403  | Error. Permission denied  |   | 404  | Error. Object does not exist |   | 405  | Error. Method not allowed  |   | 406  | Error. Not Acceptable  |
 *
 * OpenAPI spec version: 3.0.0
 * Contact: contact@sendinblue.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.29
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SendinBlue\Client\Model;

use \ArrayAccess;
use \SendinBlue\Client\ObjectSerializer;

/**
 * CreateSmsCampaign Class Doc Comment
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CreateSmsCampaign implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'createSmsCampaign';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'sender' => 'string',
        'content' => 'string',
        'recipients' => '\SendinBlue\Client\Model\CreateSmsCampaignRecipients',
        'scheduledAt' => 'string',
        'unicodeEnabled' => 'bool',
        'organisationPrefix' => 'string',
        'unsubscribeInstruction' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'sender' => null,
        'content' => null,
        'recipients' => null,
        'scheduledAt' => null,
        'unicodeEnabled' => null,
        'organisationPrefix' => null,
        'unsubscribeInstruction' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'sender' => 'sender',
        'content' => 'content',
        'recipients' => 'recipients',
        'scheduledAt' => 'scheduledAt',
        'unicodeEnabled' => 'unicodeEnabled',
        'organisationPrefix' => 'organisationPrefix',
        'unsubscribeInstruction' => 'unsubscribeInstruction'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'sender' => 'setSender',
        'content' => 'setContent',
        'recipients' => 'setRecipients',
        'scheduledAt' => 'setScheduledAt',
        'unicodeEnabled' => 'setUnicodeEnabled',
        'organisationPrefix' => 'setOrganisationPrefix',
        'unsubscribeInstruction' => 'setUnsubscribeInstruction'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'sender' => 'getSender',
        'content' => 'getContent',
        'recipients' => 'getRecipients',
        'scheduledAt' => 'getScheduledAt',
        'unicodeEnabled' => 'getUnicodeEnabled',
        'organisationPrefix' => 'getOrganisationPrefix',
        'unsubscribeInstruction' => 'getUnsubscribeInstruction'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['sender'] = isset($data['sender']) ? $data['sender'] : null;
        $this->container['content'] = isset($data['content']) ? $data['content'] : null;
        $this->container['recipients'] = isset($data['recipients']) ? $data['recipients'] : null;
        $this->container['scheduledAt'] = isset($data['scheduledAt']) ? $data['scheduledAt'] : null;
        $this->container['unicodeEnabled'] = isset($data['unicodeEnabled']) ? $data['unicodeEnabled'] : false;
        $this->container['organisationPrefix'] = isset($data['organisationPrefix']) ? $data['organisationPrefix'] : null;
        $this->container['unsubscribeInstruction'] = isset($data['unsubscribeInstruction']) ? $data['unsubscribeInstruction'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['sender'] === null) {
            $invalidProperties[] = "'sender' can't be null";
        }
        if ((mb_strlen($this->container['sender']) > 15)) {
            $invalidProperties[] = "invalid value for 'sender', the character length must be smaller than or equal to 15.";
        }

        if ($this->container['content'] === null) {
            $invalidProperties[] = "'content' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Name of the campaign
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->container['sender'];
    }

    /**
     * Sets sender
     *
     * @param string $sender Name of the sender. **The number of characters is limited to 11 for alphanumeric characters and 15 for numeric characters**
     *
     * @return $this
     */
    public function setSender($sender)
    {
        if ((mb_strlen($sender) > 15)) {
            throw new \InvalidArgumentException('invalid length for $sender when calling CreateSmsCampaign., must be smaller than or equal to 15.');
        }

        $this->container['sender'] = $sender;

        return $this;
    }

    /**
     * Gets content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->container['content'];
    }

    /**
     * Sets content
     *
     * @param string $content Content of the message. The maximum characters used per SMS is 160, if used more than that, it will be counted as more than one SMS
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->container['content'] = $content;

        return $this;
    }

    /**
     * Gets recipients
     *
     * @return \SendinBlue\Client\Model\CreateSmsCampaignRecipients
     */
    public function getRecipients()
    {
        return $this->container['recipients'];
    }

    /**
     * Sets recipients
     *
     * @param \SendinBlue\Client\Model\CreateSmsCampaignRecipients $recipients recipients
     *
     * @return $this
     */
    public function setRecipients($recipients)
    {
        $this->container['recipients'] = $recipients;

        return $this;
    }

    /**
     * Gets scheduledAt
     *
     * @return string
     */
    public function getScheduledAt()
    {
        return $this->container['scheduledAt'];
    }

    /**
     * Sets scheduledAt
     *
     * @param string $scheduledAt UTC date-time on which the campaign has to run (YYYY-MM-DDTHH:mm:ss.SSSZ). Prefer to pass your timezone in date-time format for accurate result.
     *
     * @return $this
     */
    public function setScheduledAt($scheduledAt)
    {
        $this->container['scheduledAt'] = $scheduledAt;

        return $this;
    }

    /**
     * Gets unicodeEnabled
     *
     * @return bool
     */
    public function getUnicodeEnabled()
    {
        return $this->container['unicodeEnabled'];
    }

    /**
     * Sets unicodeEnabled
     *
     * @param bool $unicodeEnabled Format of the message. It indicates whether the content should be treated as unicode or not.
     *
     * @return $this
     */
    public function setUnicodeEnabled($unicodeEnabled)
    {
        $this->container['unicodeEnabled'] = $unicodeEnabled;

        return $this;
    }

    /**
     * Gets organisationPrefix
     *
     * @return string
     */
    public function getOrganisationPrefix()
    {
        return $this->container['organisationPrefix'];
    }

    /**
     * Sets organisationPrefix
     *
     * @param string $organisationPrefix A recognizable prefix will ensure your audience knows who you are. Recommended by U.S. carriers. This will be added as your Brand Name before the message content. **Prefer verifying maximum length of 160 characters including this prefix in message content to avoid multiple sending of same sms.**
     *
     * @return $this
     */
    public function setOrganisationPrefix($organisationPrefix)
    {
        $this->container['organisationPrefix'] = $organisationPrefix;

        return $this;
    }

    /**
     * Gets unsubscribeInstruction
     *
     * @return string
     */
    public function getUnsubscribeInstruction()
    {
        return $this->container['unsubscribeInstruction'];
    }

    /**
     * Sets unsubscribeInstruction
     *
     * @param string $unsubscribeInstruction Instructions to unsubscribe from future communications. Recommended by U.S. carriers. Must include **STOP** keyword. This will be added as instructions after the end of message content. **Prefer verifying maximum length of 160 characters including this instructions in message content to avoid multiple sending of same sms.**
     *
     * @return $this
     */
    public function setUnsubscribeInstruction($unsubscribeInstruction)
    {
        $this->container['unsubscribeInstruction'] = $unsubscribeInstruction;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}



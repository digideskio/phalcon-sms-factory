<?php
namespace SMSFactory\Config;

use SMSFactory\Aware\ProviderConfigInterface;
use Phalcon\Exception;

/**
 * Class SmsUkraine. Configuration for SmsUkraine provider
 *
 * @since     PHP >=5.4
 * @version   1.0
 * @author    Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 * @package SMSFactory\Config
 * @subpackage SMSFactory
 */
class SmsUkraine implements ProviderConfigInterface
{

    /**
     * Message uri
     *
     * @const string SEND_MESSAGE_URI
     */
    const SEND_MESSAGE_URI = 'http://smsukraine.com.ua/api/http.php';

    /**
     * Balance uri
     *
     * @const string GET_BALANCE_URI
     */
    const GET_BALANCE_URI = 'http://smsukraine.com.ua/api/json.php';

    /**
     * Success HTTP codes responding
     *
     * @var array $httpSuccessCode
     */
    public $httpSuccessCode = [200];



    /**
     * Provider config container
     *
     * @access static
     * @var array
     */
    private $config = [];

    /**
     * Setup injected configuration
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config)
    {

        $this->config = $config;
    }

    /**
     * Get message uri
     *
     * @return string
     */
    public function getMessageUri()
    {

        return (isset($this->config['message_uri']) === true) ? $this->config['message_uri']
            : self::SEND_MESSAGE_URI;
    }

    /**
     * Get balance uri
     *
     * @return string
     */
    public function getBalanceUri()
    {

        return (isset($this->config['balance_uri']) === true) ? $this->config['balance_uri']
            : self::GET_BALANCE_URI;
    }

    /**
     * Get provider response method
     *
     * @return string
     */
    public function getRequestMethod()
    {

        return (isset($this->config['request_method']) === true) ? $this->config['request_method']
            : self::REQUEST_METHOD;
    }

    /**
     * Get provider configurations
     *
     * @return void
     */
    public function getProviderConfig()
    {

        if (empty($this->config) === false) {
            return $this->config;
        } else {
            throw new Exception('Empty provider config');
        }
    }
}

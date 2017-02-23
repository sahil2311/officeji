<?php
/**
* Zend Framework
*
* LICENSE
*
* This source file is subject to the new BSD license that is bundled
* with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://framework.zend.com/license/new-bsd
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@zend.com so we can send you a copy immediately.
*
* @category	Zend
* @package	 mail_bank_Zend_Mail
* @subpackage Transport
* @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
* @license	 http://framework.zend.com/license/new-bsd	  New BSD License
* @version	 $Id$
*/
if(!defined("ABSPATH")) exit; // Exit if accessed directly
/**
* @see mail_bank_Zend_Mail_Transport_Abstract
*/
if(file_exists(MAIL_BANK_DIR_PATH.'lib/zend/mail/transport/abstract.php'))
require_once MAIL_BANK_DIR_PATH.'lib/zend/mail/transport/abstract.php';


/**
* File transport
*
* Class for saving outgoing emails in filesystem
*
* @category	Zend
* @package	 mail_bank_Zend_Mail
* @subpackage Transport
* @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
* @license	 http://framework.zend.com/license/new-bsd	  New BSD License
*/
class mail_bank_Zend_Mail_Transport_File extends mail_bank_Zend_Mail_Transport_Abstract
{
	/**
	* Target directory for saving sent email messages
	*
	* @var string
	*/
	protected $_path;

	/**
	* Callback function generating a file name
	*
	* @var string|array
	*/
	protected $_callback;

	/**
	* Constructor
	*
	* @param  array|mail_bank_Zend_Config $options OPTIONAL (Default: null)
	* @return void
	*/
	public function __construct($options = null)
	{
		if ($options instanceof mail_bank_Zend_Config)
		{
			$options = $options->toArray();
		} elseif (!is_array($options))
		{
			$options = array();
		}

		// Making sure we have some defaults to work with
		if (!isset($options['path']))
		{
			$options['path'] = sys_get_temp_dir();
		}
		if (!isset($options['callback']))
		{
			$options['callback'] = array($this, 'defaultCallback');
		}

		$this->setOptions($options);
	}

	/**
	* Sets options
	*
	* @param  array $options
	* @return void
	*/
	public function setOptions(array $options)
	{
		if (isset($options['path']) && is_dir($options['path']))
		{
			$this->_path = $options['path'];
		}
		if (isset($options['callback']) && is_callable($options['callback']))
		{
			$this->_callback = $options['callback'];
		}
	}

	/**
	* Saves e-mail message to a file
	*
	* @return void
	* @throws mail_bank_Zend_Mail_Transport_Exception on not writable target directory
	* @throws mail_bank_Zend_Mail_Transport_Exception on file_put_contents() failure
	*/
	protected function _sendMail()
	{
		$file = $this->_path . DIRECTORY_SEPARATOR . call_user_func($this->_callback, $this);

		if (!is_writable(dirname($file)))
		{
			if(file_exists(MAIL_BANK_DIR_PATH.'lib/zend/mail/transport/exception.php'))
			require_once MAIL_BANK_DIR_PATH.'lib/zend/mail/transport/exception.php';

			throw new mail_bank_Zend_Mail_Transport_Exception(sprintf(
				'Target directory "%s" does not exist or is not writable',
				dirname($file)
			));
		}

		$email = $this->header . $this->EOL . $this->body;

		if (!file_put_contents($file, $email))
		{
			if(file_exists(MAIL_BANK_DIR_PATH.'lib/zend/mail/transport/exception.php'))
			require_once MAIL_BANK_DIR_PATH.'lib/zend/mail/transport/exception.php';

			throw new mail_bank_Zend_Mail_Transport_Exception('Unable to send mail');
		}
	}

	/**
	* Default callback for generating filenames
	*
	* @param mail_bank_Zend_Mail_Transport_File File transport instance
	* @return string
	*/
	public function defaultCallback($transport)
	{
		return 'ZendMail_' . $_SERVER['REQUEST_TIME'] . '_' . mt_rand() . '.tmp';
	}
}
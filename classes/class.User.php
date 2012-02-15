<?php

/**
* PHPReddit
*
* An open source PHP Wrapper for the Reddit API
*
* NOTICE OF LICENSE
*
* Licensed under a Creative Commons Attribution 3.0 Unported License
*
* PHPReddit by Pangaea Apps Ltd. is licensed under a 
* Creative Commons Attribution 3.0 Unported License.
* Permissions beyond the scope of this license may be 
* available at licensing@pangaeaapps.com.
*
* @package PHPReddit
* @author Pangaea Apps Ltd.
* @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution (CC 3.0)
* @link http://pangaeaapps.com
* @since Version 1.0
* @filesource
*/

/**
* User API class
*
* This class holds all the Reddit User API calls.
* It will be extended in the Reddit namespace.
*
* @package PHPReddit
* @subpackage Reddit
* @category API
* @author Pangaea Apps Ltd.
*/
abstract class User
{
	public
		$__http,
		$__session,
		$__cookie,
		$__modhash;

	abstract function Login( $username, $password );
	abstract function About( $username );
	abstract function Me();

	function __construct( \HTTP\Http $http )
	{
		$this->__http = $http;
	}

	function Authenticate()
	{
		$this->__http->setOptions(array(
			CURLOPT_HTTPHEADER => array("Cookie: reddit_session={$this->__cookie}")
		));
	}

	function AuthPost( $url, array $postFields )
	{
		$this->__http->setUrl( $url );
		$this->Authenticate();
		$postFields['uh'] = $this->__modhash;
		return $this->__http->post($postFields);
	}

	function AuthGet( $url )
	{
		$this->__http->setUrl( $url );
		$this->Authenticate();	
		return $this->__http->get();
	}
}
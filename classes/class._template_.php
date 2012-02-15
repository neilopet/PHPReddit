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
* _template_ API class
*
* This class holds all the Reddit _template_ API calls.
* It will be extended in the Reddit namespace.
*
* @package PHPReddit
* @subpackage Reddit
* @category API
* @author Pangaea Apps Ltd.
*/
abstract class _template_
{
	public
		$__http,
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
		$this->__http =& $user->__http;
	}
}
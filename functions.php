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

// I'm adding another comment - Neil
function dump()
{
	$args = func_get_args();
	array_map(function( $obj ) {
		var_dump($obj);
		echo "\r\n--------------------------------------------------\r\n\r\n";
	}, $args);
}

function base36_decode( $str )
{
	return base_convert($str, 36, 10);
}

function base36_encode( $str )
{
	return base_convert($str, 10, 36);
}

function FormatUrl( $url, array $rep )
{
	return strtr( $url, $rep );
}
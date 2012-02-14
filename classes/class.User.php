<?php

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
}
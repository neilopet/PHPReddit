<?php

namespace AbstractReddit
{
	abstract class User
	{
		public
			$__http,
			$__session,
			$__cookie,
			$__modhash;

		abstract function Login( $username, $password );
		abstract function About( $username );

		function __construct( \HTTP\Http $http )
		{
			$this->__http = $http;
		}
	}
}
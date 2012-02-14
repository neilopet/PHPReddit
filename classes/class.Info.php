<?php

abstract class Info
{
	public
		$__http,
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
		$this->__http =& $user->__http;
	}

	abstract function GetInfo( $id );
}
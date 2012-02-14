<?php

abstract class Comment
{
	public
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
	}
}
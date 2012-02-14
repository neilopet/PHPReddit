<?php

abstract class _template_
{
	public
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
	}
}
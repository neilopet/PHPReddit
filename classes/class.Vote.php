<?php

abstract class Vote
{
	public
		$__http,
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
		$this->__http =& $user->__http;
	}

	abstract function vote( $id, $dir );
	abstract function upvote( $id );
	abstract function rescind( $id );
	abstract function downvote( $id );
}
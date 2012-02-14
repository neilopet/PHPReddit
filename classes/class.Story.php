<?php

abstract class Story
{
	public
		$__http,
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
		$this->__http =& $user->__http;
	}

	abstract function Submit( $type, $subreddit, $title, $content );
	abstract function MarkNSFW( $id );
	abstract function UnmarkNSFW( $id );
}
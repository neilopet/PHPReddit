<?php

abstract class Comment
{
	public
		$__http,
		$__user;

	function __construct( \Reddit\User $user )
	{
		$this->__user = $user;
		$this->__http =& $user->__http;
	}

	abstract function Reply( $topic, $text );
	abstract function MoreChildren( $children, $id, $link_id, $pv_hex, $where);
}
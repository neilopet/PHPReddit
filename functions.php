<?php

function dump()
{
	$args = func_get_args();
	array_map(function( $obj ) {
		var_dump($obj);
		echo '<br />';
	}, $args);
}
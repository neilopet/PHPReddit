<?php

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
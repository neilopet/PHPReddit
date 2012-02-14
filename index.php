<?php

require_once 'functions.php';
require_once 'HTTP.php';
require_once 'classes/class.User.php';
require_once 'classes/class.Comment.php';
require_once 'Reddit.php';

// r/aliengreen Test Topic
define('TOPIC_ID', 'ppj0h');

$http = HTTP\Http::init();

$user = new Reddit\User( $http );
$comment = new Reddit\Comment( $user );

header('Content-Type: text/plain');

// Comment class
dump(
	'test'
);

/*
// User class
dump(
	$user->About('kr3w570'),
	$user->Login('kr3w570', 'fuckyou'),
	$user->Me(),
	$user->Mine()
);
*/
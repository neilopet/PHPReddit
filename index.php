
<?php

require_once 'functions.php';
require_once 'HTTP.php';
require_once 'class.User.php';
require_once 'Reddit.php';

$http = HTTP\Http::init();

$user = new Reddit\User( $http );
dump(
	$user->About('kr3w570'),
	$user->Login('kr3w570', 'fuckyou'),
	$user->Me()
);
<?php

require_once 'functions.php';
require_once 'HTTP.php';
require_once 'classes/class.User.php';
require_once 'classes/class.Comment.php';
require_once 'classes/class.Story.php';
require_once 'classes/class.Vote.php';
require_once 'classes/class.Info.php';
require_once 'Reddit.php';

header('Content-Type: text/plain');

// r/aliengreen Test Topic
define('THREAD_ID', 'pppef');

$http = HTTP\Http::init();

$user = new Reddit\User( $http );
$user->Login('kr3w570', 'fuckyou');

$comment = new Reddit\Comment( $user );
$story = new Reddit\Story( $user );
$vote = new Reddit\Vote( $user );
$info = new Reddit\Info( $user );

dump(
	//$user->About('kr3w570'),
	//$user->Me(),
	//$user->Mine()
	//$story->Submit( 'link', 'aliengreen', 'Test from the API', 'http://www.pangaeaapps.com' ),
	//$story->Submit( 'self', 'aliengreen', 'Another test from the API', 'Self p0st!' )
	//$comment->Reply(\Reddit\LINK(THREAD_ID), 'Hello world!'),
	//$vote->rescind(\Reddit\LINK(THREAD_ID)),
	//$story->UnmarkNSFW(\Reddit\LINK(THREAD_ID))
	//$info->GetInfo(\Reddit\LINK('ppbto'))
);
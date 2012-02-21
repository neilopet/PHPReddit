<?php

/**
* PHPReddit
*
* An open source PHP Wrapper for the Reddit API
*
* NOTICE OF LICENSE
*
* Licensed under a Creative Commons Attribution 3.0 Unported License
*
* PHPReddit by Pangaea Apps Ltd. is licensed under a 
* Creative Commons Attribution 3.0 Unported License.
* Permissions beyond the scope of this license may be 
* available at licensing@pangaeaapps.com.
*
* @package PHPReddit
* @author Pangaea Apps Ltd.
* @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution (CC 3.0)
* @link http://pangaeaapps.com
* @since Version 1.0
* @filesource
*/

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
$user->Login('myuser', 'mypassword');

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
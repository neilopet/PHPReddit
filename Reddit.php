<?php

namespace Urls
{
	// API Urls
	const USER_LOGIN    = 'https://ssl.reddit.com/api/login/:username';
	const USER_ABOUT    = 'http://www.reddit.com/user/:username/about.json';
	const USER_ME       = 'http://www.reddit.com/api/me.json';
	const USER_MINE     = 'http://www.reddit.com/reddits/mine.json';
	const COMMENT_REPLY = 'http://www.reddit.com/api/comment';
	const STORY_SUBMIT  = 'http://www.reddit.com/api/submit';
	const STORY_NSFW    = 'http://www.reddit.com/api/marknsfw';
	const STORY_UNNSFW  = 'http://www.reddit.com/api/unmarknsfw';
	const VOTE 			= 'http://www.reddit.com/api/vote';
	const INFO    		= 'http://www.reddit.com/api/info.json?id=:id';
}

namespace Reddit
{
	class User extends \User
	{
		function Login( $username, $password )	
		{
			$this->__http->setUrl(FormatUrl(\Urls\USER_LOGIN, array(
				':username' => $username
			)));
			$response = json_decode($this->__http->post(array(
				'api_type' => 'json',
				'passwd'   => $password,
				'user'     => $username
			)));
			$this->__cookie = $response->json->data->cookie;
			$this->__modhash = $response->json->data->modhash;
			return $response;
		}

		function About( $username )
		{
			$this->__http->setUrl(FormatURL(\Urls\USER_ABOUT, array(
				':username' => $username
			)));
			return json_decode($this->__http->get());
		}

		function Me()
		{
			return json_decode($this->AuthGet(\Urls\USER_ME));
		}

		function Mine()
		{
			return json_decode($this->AuthGet(\Urls\USER_MINE));
		}
	}

	class Comment extends \Comment
	{
		function Reply( $parent, $text )
		{
			return json_decode($this->__user->AuthPost(
				\Urls\COMMENT_REPLY,
				array(
					'parent' => $parent,
					'text'   => $text
			)));
		}

		function MoreChildren( $children, $id, $link_id, $pv_hex, $where)
		{
			// code here ...
		}
	}

	class Story extends \Story
	{
		function Submit( $type, $subreddit, $title, $content )
		{
			$postData = array
			(
				'kind'  => $type,
				'sr'    => $subreddit,
				'title' => $title,
				'r'     => $subreddit
			);
			$postData[ ($type == 'self' ? 'text' : 'url') ] = $content;
			$response = json_decode(
				$this->__user->AuthPost(
					\Urls\STORY_SUBMIT, 
					$postData
				)
			);
			return $response;
		}

		function MarkNSFW( $id )
		{
			return json_decode($this->__user->AuthPost(
				\Urls\STORY_NSFW,
				array(
					'id' => $id
				)
			));
		}

		function UnmarkNSFW( $id )
		{
			return json_decode($this->__user->AuthPost(
				\Urls\STORY_UNNSFW,
				array(
					'id' => $id
				)
			));
		}
	}

	class Vote extends \Vote
	{
		function vote( $id, $dir )
		{
			return json_decode($this->__user->AuthPost(
				\Urls\VOTE,
				array
				(
					'id'  => $id,
					'dir' => $dir
				)
			));
		}

		function upvote( $id )
		{
			return $this->vote( $id, 1 );
		}

		function rescind( $id )
		{
			return $this->vote( $id, 0 );
		}

		function downvote( $id )
		{
			return $this->vote( $id, -1 );
		}
	}

	class Info extends \Info
	{
		function GetInfo( $id )
		{
			return json_decode($this->__user->AuthGet(FormatUrl(\Urls\INFO, 
				array(
					':id' => $id
				)
			)));
		}
	}


	/* Url prefixes based on the type of submission */
	/* Comment: 1 */
	function COMMENT( $id36 )
	{
		return "t1_{$id36}";
	}
	/* Account: 2 */
	function ACCOUNT( $id36 )
	{
		return "t2_{$id36}";
	}
	/* Link: 3 */
	function LINK( $id36 )
	{
		return "t3_{$id36}";
	}
	/* Message: 4 */
	function MESSAGE( $id36 )
	{
		return "t4_{$id36}";
	}
	/* Subreddit: 5 */
	function SUBREDDIT( $id36 )
	{
		return "t5_{$id36}";
	}
}
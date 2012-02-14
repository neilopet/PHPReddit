<?php

namespace Urls
{
	// API Urls
	const LOGIN = 'https://ssl.reddit.com/api/login/:username';
	const ABOUT = 'http://www.reddit.com/user/:username/about.json';
	const ME    = 'http://www.reddit.com/api/me.json';
	const MINE  = 'http://www.reddit.com/reddits/mine.json';
}

namespace Reddit
{
	class User extends \User
	{
		function Login( $username, $password )	
		{
			$this->__http->setUrl(\Urls\LOGIN, array(
				':username' => $username
			));
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
			$this->__http->setUrl(\Urls\ABOUT, array(
				':username' => $username
			));
			return json_decode($this->__http->get());
		}

		function Me()
		{
			$this->__http->setUrl(\Urls\ME);
			$this->Authenticate();
			return json_decode($this->__http->get());
		}

		function Mine()
		{
			$this->__http->setUrl(\Urls\MINE);
			$this->Authenticate();
			return json_decode($this->__http->get());
		}
	}

	class Comment extends \Comment
	{
		
	}
}
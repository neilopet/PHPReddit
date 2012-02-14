<?php

namespace HTTP
{
	interface IHttp
	{
		public function setUrl( $url );			   // Set the CURL object URL.	
		public function post( array $postFields ); // Send a POST request to $url with $postFields as the POST data.
		public function get( /* void */ ); 		   // Send a GET request to $url.
	}

	class Http implements IHttp
	{
		private static $__instance;
		public
			$__ch,
			$__url,
			$__postFields,
			$__options = array();
		
		private function __construct()
		{
			$this->resetOptions();
		}

		function __destruct()
		{
			curl_close($this->__ch);
		}

		public static function init()
		{
			if (!isset(self::$__instance)) 
			{
	            $className = __CLASS__;
	            self::$__instance = new $className;
	            self::$__instance->__ch = curl_init();
	        }
	        return self::$__instance;
    	}

    	final function setOptions( array $options )
		{
				$this->__options += $options;
		}

		final function resetOptions()
    	{
    		$this->__options = array
			(
				CURLOPT_POST 		   => FALSE,
				CURLOPT_FRESH_CONNECT  => TRUE,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_HEADER		   => FALSE,
				CURLOPT_SSL_VERIFYHOST => FALSE,
    			CURLOPT_SSL_VERIFYPEER => FALSE,
    			CURLOPT_USERAGENT 	   => 'Mozilla/5.0 (iPad; U; CPU OS 3_2_1 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Mobile/7B405'
			);
    	}

		final function setUrl( $url )
		{
			$this->resetOptions();
			$this->__url = $url;
		}

		final function __exec( $opt )
		{
			$ret = '';
			
			$this->setOptions(array(
					CURLOPT_URL => $this->__url 
			));

			switch (strtolower($opt))
			{
				// obviously a post
				case 'post':
					$this->setOptions(array(
						CURLOPT_POST       => TRUE,
						CURLOPT_POSTFIELDS => $this->__postFields
					));
					break;
				
				// get request
				default:
					break;
			}

			curl_setopt_array( $this->__ch, $this->__options );
			$ret = curl_exec( $this->__ch );

			return $ret;
		}

		function post( array $postFields )
		{
			$this->__postFields = $postFields;
			return $this->__exec( 'post' );
		}

		function get( /* void */ )
		{
			return $this->__exec( 'get' );
		}
	}
}
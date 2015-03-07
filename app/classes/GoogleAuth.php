<?php

class GoogleAuth
{
	private $db;
	private $client;

	public function __construct(DB $db, Google_Client $googleClient)
	{
		$this->db = $db;
		$this->client = $googleClient;

		$this->client->setClientId('251320849887-uml60p8f0qprglirv89c2q83i194vnfi.apps.googleusercontent.com');
		$this->client->setClientSecret('_2vv1kIy1e4zt0GdHWDyDTyN');
		$this->client->setRedirectUri('http://localhost/Usercake/index.php');
		$this->client->setScopes('email');


	}

	public function checkToken()
	{
		if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token']))
		{
			$this->client->setAccessToken($_SESSION['access_token']);
		}
		else
		{
			return $this->client->createAuthUrl();

		}

		return '';

	}

	public function login()
	{
		if(isset($_GET['code']))
		{
			$this->client->authenticate($_GET['code']);

			$_SESSION['access_token'] = $this->client->getAccessToken();

			//store user in db

			return true;

		}
		return false;


	}

	public function logout()
	{
		unset($_SESSION['access_token']);

	}

}
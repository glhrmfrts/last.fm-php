<?php

require('apimodel.class.php');

/**
 * This class is a helper for all last.fm's api methods
 */

class LastFm 
{

	/**
	 * The common part of the url for all apis
	 */
	private $urlPrefix = "http://ws.audioscrobbler.com/2.0/";

	/**
	 * The api's account key
	 */
	public $apiKey = "";

	/**
	 * The album api
	 */
	public $album = null;

	/**
	 * The artists api
	 */
	public $artist = null;
	
	/**
	 * Auth api
	 */
	public $auth = null;

	/**
	 * Chart api
	 */
	public $chart = null;

	/**
	 * Event api
	 */
	public $event = null;

	/**
	 * Geo api
	 */
	public $geo = null;

	/**
	 * Group api
	 */
	public $group = null;

	/**
	 * Library api
	 */
	public $library = null;

	/**
	 * Playlist api
	 */
	public $playlist = null;

	/**
	 * Tag api
	 */
	public $tag = null;

	/**
	 * Tasteometer api
	 */
	public $tasteometer = null;

	/**
	 * Track api
	 */
	public $track = null;

	/**
	 * User api
	 */
	public $user = null;

	/**
	 * Venue api
	 */
	public $venue = null;


	/**
	 * The constructor of the LastFm
	 */
	public function __construct($apiKey)
	{
		$this->apiKey = $apiKey;

		$apis = get_object_vars($this);

		$config = new StdClass();
		$config->key = $this->apiKey;
		$config->url = $this->urlPrefix;

		foreach ($apis as $key => $value) {

			$this->{$key} = $this->createApi($key, $config);
		}
	}

	public function createApi($name, $config)
	{
		if ($name == "url_prefix")
			return;

		$api = new ApiModel($name, $config);

		return $api;
	}

	public function getApiKey()
	{
		return $this->apiKey;
	}

	public function getUrlPrefix()
	{
		return $this->urlPrefix;
	}

}
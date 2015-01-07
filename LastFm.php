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

	/**
	 * Creates a new api from the ApiModel
	 *
	 * @method createApi
	 * @param {string} The name of this api
	 * @param {object} An object containing some goods like the account key and the url prefix
	 * @return {object(ApiModel)} The api itself
	 */
	private function createApi($name, $config)
	{
		if ($name == "url_prefix")
			return;

		$api = new ApiModel($name, $config);

		return $api;
	}

	/**
	 * Get the api account key
	 *
	 * @method getApiKey
	 * @return {string} The account's key
	 */
	public function getApiKey()
	{
		return $this->apiKey;
	}

	/**
	 * Get the url prefix for the whole api
	 *
	 * @method getUrlPrefix
	 * @return {string} The url prefix
	 */
	public function getUrlPrefix()
	{
		return $this->urlPrefix;
	}

}
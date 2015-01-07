<?php

class ApiModel {

	/**
	 * The name of this api
	 */
	public $name;

	/**
	 * A object that has the key and the url prefix
	 */
	public $config;


	/**
	 * The constructor of the model
	 */
	public function __construct($name, $config)
	{
		$this->name = $name;
		$this->config = $config;
	}

	/**
	 * This will handle all api's methods calls
	 */
	public function __call($method, $args)
	{
		$url = $this->createUrl($method, $args);
		$call = file_get_contents($url);

		return $call;
	}

	/**
	 * Create a url with query strings for the request
	 *
	 * @method createUrl
	 * @param {string} The name of the method
	 * @param {array} The arguments of the method
	 * @return {string} The whole url for the request 
	 */
	private function createUrl($method, $args)
	{
		$url = $this->config->url;

		$query = $args[0];
		$query['method'] = $this->name .'.'. $method;
		$query['api_key'] = $this->config->key;

		$url .= '?'.http_build_query($query);

		var_dump($url);
		return $url;
	}
}
<?php

class ApiModel {

	public $name;

	public $config;

	public function __construct($name, $config)
	{
		$this->name = $name;
		$this->config = $config;
	}

	public function __call($method, $args)
	{

		$url = $this->createUrl($method, $args);
		$call = file_get_contents($url);

		return $call;
	}

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
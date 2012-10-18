<?php

class Countries
{
	/**
	 * Countries array
	 * @var array
	 */
	protected $countries = array();

	/**
	 * Static variable for object instance
	 * @var mixed
	 */
	protected static $instance  = null;

	/**
	 * Gets and assigns countries
	 *
	 * @return void
	 */
	function __construct()
	{
		$json = file_get_contents(realpath(__DIR__.DIRECTORY_SEPARATOR.'countries.json'));

		$this->countries = json_decode($json, true);
	}

	/**
	 * Forges an object instance
	 * 
	 * @return void
	 */
	public static function forge()
	{
		static::$instance = new static();
	}

	/**
	 * Gets countries array
	 * 
	 * @return array Countries array
	 */
	public static function ls()
	{
		if(static::$instance === null)
		{
			static::forge();
		}

		return static::$instance->countries;
	}
}
<?php
namespace NginxPublishStream\Stream;

/**
 * Class Endpoint
 * @package NginxPublishStream\Stream
 */
class Endpoint {

	/**
	 * @var string
	 */
	protected $pub;

	/**
	 * @var string
	 */
	protected $sub;

	/**
	 * @param string $pub
	 * @param string $sub
	 */
	public function __construct($pub = 'pub', $sub = 'sub')
	{
		$this->pub = $pub;
		$this->sub = $sub;
	}

	/**
	 * @return string
	 */
	public function getPub()
	{
		return $this->pub;
	}

	/**
	 * @return string
	 */
	public function getSub()
	{
		return $this->sub;
	}
}
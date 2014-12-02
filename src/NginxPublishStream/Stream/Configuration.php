<?php
namespace NginxPublishStream\Stream;

/**
 * Class Configuration
 * @package NginxPublishStream\Stream
 */
class Configuration
{

	/**
	 * @var string
	 */
	protected $host;

	/**
	 * @var int
	 */
	protected $port;

	/**
	 * @var Endpoint
	 */
	protected $endpoint;

	/**
	 * @param string $host
	 * @param int    $port
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct($host, $port, Endpoint $endpoint = null)
	{
		$this->host = $host;
		if (!is_numeric($port)) {
			throw new \InvalidArgumentException('Port must be a numeric');
		}
		$this->port = $port;
		if (!$endpoint) {
			$this->endpoint = new Endpoint();
		} else {
			$this->endpoint = $endpoint;
		}
	}

	/**
	 * @return string
	 */
	public function getHost()
	{
		return $this->host;
	}

	/**
	 * @return int
	 */
	public function getPort()
	{
		return $this->port;
	}

	/**
	 * @return Endpoint
	 */
	public function getEndpoint()
	{
		return $this->endpoint;
	}
}
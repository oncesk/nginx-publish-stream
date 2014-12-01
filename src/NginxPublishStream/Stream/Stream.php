<?php
namespace NginxPublishStream\Stream;

use NginxPublishStream\Stream\Transport\TransportInterface;

class Stream implements StreamInterface
{

	/**
	 * @var Configuration
	 */
	protected $configuration;

	/**
	 * @var TransportInterface
	 */
	protected $transport;

	/**
	 * @var string
	 */
	protected $baseUrlPattern;

	/**
	 * @param Configuration $configuration
	 */
	public function __construct(Configuration $configuration, TransportInterface $transport)
	{
		$this->configuration = $configuration;
		$this->baseUrlPattern = $configuration->getHost() . ':' . $configuration->getPort() . '/%s';
		$this->transport = $transport;
	}

	/**
	 * @param string|int $channelId
	 * @param string     $data
	 *
	 * @return mixed
	 */
	public function write($channelId, $data, \Closure $completeCallable = null)
	{
		$url = sprintf(
				$this->baseUrlPattern,
				$this->getConfiguration()->getEndpoint()->getPub()
			) . '?id=' . $channelId;
		try {
			$this->transport->post($url, $data);
			if ($completeCallable) {
				$completeCallable(false);
			}
		} catch (\RuntimeException $e) {
			if ($completeCallable) {
				$completeCallable(true);
			}
		}
	}

	/**
	 * @return Configuration
	 */
	public function getConfiguration()
	{
		return $this->configuration;
	}

	/**
	 * @param          $channelId
	 * @param callable $callable
	 */
	public function listen($channelId, \Closure $callable)
	{
		$url = sprintf(
				$this->baseUrlPattern,
				$this->getConfiguration()->getEndpoint()->getSub()
			) . '/?id=' . $channelId;
		try {
			$data = $this->transport->get($url);
			$callable(false, $data);
		} catch (\RuntimeException $e) {
			$callable(true);
		}
	}
}
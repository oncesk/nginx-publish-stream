<?php
namespace NginxPublishStream\Stream;

use NginxPublishStream\Stream\Transport\TransportInterface;

interface StreamInterface
{

	/**
	 * @param Configuration      $configuration
	 * @param TransportInterface $transport
	 */
	public function __construct(Configuration $configuration, TransportInterface $transport);

	/**
	 * @return Configuration
	 */
	public function getConfiguration();

	/**
	 * @param string|int $channelId
	 * @param string     $data
	 *
	 * @return mixed
	 */
	public function write($channelId, $data);

	/**
	 * @param          $channelId
	 * @param callable $callable
	 */
	public function listen($channelId, \Closure $callable);
} 
<?php
namespace NginxPublishStream\Stream\Transport;

interface TransportInterface
{

	/**
	 * @param string $url
	 * @param string $body
	 *
	 * @return string
	 */
	public function post($url, $body);

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	public function get($url);
} 
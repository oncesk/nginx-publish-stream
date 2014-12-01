<?php
namespace NginxPublishStream\Stream\Transport;

/**
 * Class Curl
 * @package NginxPublishStream\Stream\Transport
 */
class Curl implements TransportInterface {

	/**
	 * @param string $url
	 * @param string $body
	 *
	 * @throws \RuntimeException
	 *
	 * @return string
	 */
	public function post($url, $body)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		return $this->curlExec($ch);
	}

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	public function get($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		return $this->curlExec($ch);
	}

	/**
	 * @param resource $ch
	 * @throws \RuntimeException
	 * @return string
	 */
	protected function curlExec($ch) {
		$result = curl_exec($ch);
		if (curl_errno($ch) === 0) {
			curl_close($ch);
			return $result;
		}
		curl_close($ch);
		throw new \RuntimeException(curl_error($ch));
	}
}
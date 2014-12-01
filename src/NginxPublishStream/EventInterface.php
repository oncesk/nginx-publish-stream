<?php
namespace NginxPublishStream;

/**
 * Interface EventInterface
 * @package NginxPublishStream
 */
interface EventInterface extends \ArrayAccess
{

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @return array
	 */
	public function getMetadata();

	/**
	 * @return null|string
	 */
	public function getTag();

	/**
	 * @return array
	 */
	public function getData();
}
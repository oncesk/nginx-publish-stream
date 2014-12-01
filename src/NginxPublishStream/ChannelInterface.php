<?php
namespace NginxPublishStream;
use NginxPublishStream\Stream\StreamInterface;

/**
 * Interface ChannelInterface
 * @package NginxPublishStream
 */
interface ChannelInterface {

	/**
	 * @param string          $id
	 * @param StreamInterface $stream
	 */
	public function __construct($id, StreamInterface $stream);

	/**
	 * @return string|int
	 */
	public function getId();

	/**
	 * @param EventInterface $event
	 *
	 * @return mixed
	 */
	public function publish(EventInterface $event);

	/**
	 * @param callable $listener
	 */
	public function listen(\Closure $listener);

	/**
	 * @param EventFormatterInterface $formatter
	 */
	public function setEventFormatter(EventFormatterInterface $formatter);

	/**
	 * @return EventFormatterInterface
	 */
	public function getEventFormatter();
} 
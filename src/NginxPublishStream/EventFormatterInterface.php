<?php
namespace NginxPublishStream;

/**
 * Class EventFormatterInterface
 * @package NginxPublishStream
 */
interface EventFormatterInterface
{

	/**
	 * @param ChannelInterface $channel
	 * @param EventInterface   $event
	 *
	 * @return array
	 */
	public function format(ChannelInterface $channel, EventInterface $event);
} 
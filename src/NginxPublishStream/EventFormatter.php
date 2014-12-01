<?php
namespace NginxPublishStream;

/**
 * Class EventFormatter
 * @package NginxPublishStream
 */
class EventFormatter implements EventFormatterInterface
{

	/**
	 * @param ChannelInterface $channel
	 * @param EventInterface   $event
	 *
	 * @return array
	 */
	public function format(ChannelInterface $channel, EventInterface $event)
	{
		return [
			'channel' => [
				'id' => $channel->getId()
			],
			'event' => [
				'name' => $event->getName(),
				'metadata' => $event->getMetadata(),
				'data' => $event->getData(),
				'tag' => $event->getTag()
			]
		];
	}
} 
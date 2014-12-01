<?php
/**
 * Created by PhpStorm.
 * User: once
 * Date: 12/1/14
 * Time: 4:03 PM
 */

namespace NginxPublishStream;


class EventFormatter implements EventFormatterInterface {

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
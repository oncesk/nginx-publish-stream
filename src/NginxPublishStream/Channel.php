<?php
namespace NginxPublishStream;

use NginxPublishStream\Stream\StreamInterface;

/**
 * Class Channel
 * @package NginxPublishStream
 */
class Channel implements ChannelInterface
{

	/**
	 * @var string|int
	 */
	protected $id;

	/**
	 * @var StreamInterface
	 */
	protected $stream;

	/**
	 * @var EventFormatterInterface
	 */
	protected $eventFormatter;

	/**
	 * @param string          $id
	 * @param StreamInterface $stream
	 */
	public function __construct($id, StreamInterface $stream)
	{
		$this->id = $id;
		$this->stream = $stream;
	}

	/**
	 * @param EventInterface $event
	 *
	 * @return mixed
	 */
	public function publish(EventInterface $event)
	{
		return $this->stream->write(
			$this->getId(),
			json_encode($this->getEventFormatter()->format($this, $event))
		);
	}

	/**
	 * @return string|int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return EventFormatterInterface
	 */
	public function getEventFormatter()
	{
		if (!$this->eventFormatter) {
			$this->setEventFormatter(new EventFormatter());
		}
		return $this->eventFormatter;
	}

	/**
	 * @param EventFormatterInterface $formatter
	 */
	public function setEventFormatter(EventFormatterInterface $formatter)
	{
		$this->eventFormatter = $formatter;
	}

	/**
	 * @param callable $listener
	 */
	public function listen(\Closure $listener)
	{
		$this->stream->listen($this->getId(), function ($error, $response = null) use ($listener) {
			if ($error) {
				$listener($error);
				return;
			}
			$jsonDecoded = json_decode($response, true);
			if ($jsonDecoded === false || $jsonDecoded === null) {
				$listener(true, null);
			} else {
				$listener(false, $jsonDecoded);
			}
		});
	}
} 
<?php
require_once '../src/autoload.php';
require_once '../vendor/autoload.php';

$configuration = new \NginxPublishStream\Stream\Configuration('http://localhost', 8080);
$tranport = new \NginxPublishStream\Stream\Transport\Curl();
$stream = new \NginxPublishStream\Stream\Stream($configuration, $tranport);

$event = new \NginxPublishStream\Event('hello');

$channel = new \NginxPublishStream\Channel('my_channel_1', $stream);
$channel->publish($event);

$channel->listen(function ($error, $data) {
	print_r($data);
});
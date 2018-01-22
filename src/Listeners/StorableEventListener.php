<?php

namespace Grummfy\RestorableEvents\Listeners;

use Grummfy\RestorableEvents\Contract\Serialized\JsonSerializableContract;
use Illuminate\Config\Repository;

class StorableEventListener
{
	/**
	 * @var Repository
	 */
	protected $config;

	public function __construct(Repository $config)
	{
		$this->config = $config;
	}

	public function handle(JsonSerializableContract $event)
	{
		$modelClass = $this->config['restorable_event']['ModelClass'];
		$modelClass::createFromStorableEvent($event);
	}
}

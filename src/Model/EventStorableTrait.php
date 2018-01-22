<?php

namespace Grummfy\RestorableEvents\Model;

use Grummfy\RestorableEvents\Contract\Serialized\JsonSerializableContract;
use Grummfy\RestorableEvents\Contract\Serialized\RestorableContract;
use Grummfy\RestorableEvents\Serialized\RestoreArraySerializable;

trait EventStorableTrait
{
	public static function createFromStorableEvent(JsonSerializableContract $event): self
	{
		return self::create([
            'name' => get_class($event),
            'data' => $event->toArray(),
        ]);
	}

	/**
	 * Restore the event as an event object
	 *
	 * @return RestorableContract
	 * @throws \ReflectionException
	 */
	public function restore(): RestorableContract
	{
		$restorator = new RestoreArraySerializable();
		return $restorator->restoreFromArrayOfProperties($this->name, $this->data);
	}
}

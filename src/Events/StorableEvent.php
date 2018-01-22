<?php

namespace Grummfy\RestorableEvents\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

trait StorableEvent
{
	use Dispatchable, SerializesModels;

	public function toArray(): array
	{
		// __sleep change the value of the current object, so we need to clone it to avoid that ;(
		$event = (clone $this);
		$propertiesToSave = $event->__sleep();

		// build the array of restorable properties
		$result = array();
		foreach ($propertiesToSave as $propertyName)
		{
			$result[ $propertyName ] = $event->{$propertyName};
		}

		return $result;
	}
}

<?php

namespace Grummfy\RestorableEvents\Events;

use Grummfy\RestorableEvents\Contract\Serialized\JsonSerializableContract;
use Grummfy\RestorableEvents\Contract\Serialized\RestorableContract;

class RestorableEvent implements RestorableContract, JsonSerializableContract
{
	use StorableEvent;

	public function __restored(): void
	{
		// hook point
	}
}

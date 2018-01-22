<?php

namespace Grummfy\RestorableEvents\Contract\Serialized;

interface RestorableContract
{
	/**
	 * Called after the restoration to say that it's ready to work ;)
	 * Easy to hook
	 */
	public function __restored(): void;
}

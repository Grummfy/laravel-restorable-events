<?php

namespace Grummfy\RestorableEvents\Contract\Serialized;

interface JsonSerializableContract
{
	public function toArray(): array;
}

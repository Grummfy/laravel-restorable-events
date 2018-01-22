<?php

namespace Grummfy\RestorableEvents\Serialized;

use Grummfy\RestorableEvents\Contract\Serialized\RestorableContract;
use Illuminate\Queue\SerializesAndRestoresModelIdentifiers;
use ReflectionClass;

class RestoreArraySerializable
{
	use SerializesAndRestoresModelIdentifiers;

	/**
	 * Restore an object from a class name and his properties
	 *
	 * @param string $className
	 * @param array $properties
	 *
	 * @return RestorableContract
	 * @throws \ReflectionException
	 */
	public function restoreFromArrayOfProperties(string $className, array $properties)
	{
		$reflectionClass = new ReflectionClass($className);
		if (!$reflectionClass->implementsInterface(RestorableContract::class))
		{
			throw new UnrestorableDataException();
		}

		$object = $reflectionClass->newInstanceWithoutConstructor();

		// restore properties in good shape
		foreach ($properties as $property => $value)
		{
			$object->{$property} = $this->getRestoredPropertyValue($value);
		}

		// hook the restoration
		$object->__restored();

		return $object;
	}
}

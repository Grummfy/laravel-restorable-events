<?php

namespace Grummfy\RestorableEvents\ValueObject;

class ListenerInfo
{
	/**
	 * @var callable
	 */
	protected $closure;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @param callable $closure
	 * @param string $name
	 */
	public function __construct(callable $closure, string $name)
	{
		$this->closure = $closure;
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	public function __invoke(...$args)
	{
		return ($this->closure)(...$args);
	}
}

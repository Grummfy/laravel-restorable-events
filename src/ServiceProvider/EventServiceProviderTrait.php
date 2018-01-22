<?php

namespace Grummfy\RestorableEvents\ServiceProvider;

use Grummfy\RestorableEvents\Events\Dispatcher;
use Grummfy\RestorableEvents\Listeners\StorableEventListener;
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;

trait EventServiceProviderTrait
{
	/**
	 * Higher = first (100)
	 * Lower = last (-1)
	 * default = 0
	 * @var array
	 */
	protected $priorities = [
		StorableEventListener::class => -1, // -1 = last because we want to save it only if everything is ok
	];

	public function boot()
	{
		parent::boot();
		\Event::setPriorities($this->priorities);
	}

	/**
	 * @see \Illuminate\Events\EventServiceProvider::register
	 */
	public function register()
	{
		// loading our own dispatcher ;)
		$this->app->singleton('events', function ($app)
		{
			return (new Dispatcher($app))->setQueueResolver(function () use ($app)
			{
				return $app->make(QueueFactoryContract::class);
			});
		});
	}
}

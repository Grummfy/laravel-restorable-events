<?php

namespace Grummfy\RestorableEvents;

use Illuminate\Support\ServiceProvider;

class RestorableEventsProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../config/restorable_event.php' => config_path('restorable_event.php'),
		], 'config');

		if (! class_exists('CreateEventTable')) {
			$this->publishes([
				__DIR__ . '/../database/migrations/create_media_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_event_table.php'),
			], 'migrations');
		}
	}

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/restorable_event.php', 'restorable_event');
	}
}

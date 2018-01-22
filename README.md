# Laravel restorable events

This library is an help to store and restore events.

Compatible with laravel 5.5.

## Install

Install the dependencies
```
composer require grummfy/laravel-restorable-events
```

Publish the configuration
```
php artisan vendor:publish --tag=config --provider=Grummfy\RestorableEvents\RestorableEventsProvider
```

Create the model class, using the trait `EventStorableTrait`. See the example directory if you need it.

Edit your `Providers\EventServiceProvider.php`:
* Use the trait `EventServiceProviderTrait`
* You will also require to have this variable set, with at least theses values:
```php
	protected $listen = [
		JsonSerializableContract::class => [
			StorableEventListener::class,
		],
	];
```

This will allow the usage of the storage of the event on the fly.

## Usage

On any event you want to store, just extends `RestorableEvent` or implements the two interface `RestorableContract`, `JsonSerializableContract`.
The rest is made by the listener.

If you need to hook some change, when an event is restored, just implements the `restored` method available on it.

If you require you could also prioritise the events. Just fill the `$priorities` value from the trait on the service listener.

### What's stored

In the event `CreditRefilled` is dispatched, it will be saved,
but for each eloquent model, only the id and the name of the model will be saved.

## TODO
* unit test
* QA tools
  * travis
  * styleci
  * scrutinizer
  * ...

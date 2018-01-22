<?php

namespace App\Events;

use Grummfy\RestorableEvents\Events\RestorableEvent;

class CreditRefilled extends RestorableEvent
{
	/**
	 * @var Wallet
	 */
	public $wallet;

	/**
	 * @var Profile
	 */
	public $profile;

	/**
	 * @var int
	 */
	public $credits;

	public function __construct(Wallet $wallet, Profile $profile, int $credits)
	{
		$this->wallet = $wallet;
		$this->profile = $profile;
		$this->credits = $credits;
	}
}

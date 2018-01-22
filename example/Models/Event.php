<?php

namespace App\Models;

use Grummfy\RestorableEvents\Model\EventStorableTrait;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use EventStorableTrait;

	public $timestamps = true;
	const CREATED_AT = 'occurred';

	protected $casts = [
		'data' => 'json',
	];

	protected $dates = [
		'occurred',
	];

	protected $fillable = [
		'occurred',
		'name',
		'data'
	];

	public function setUpdatedAt($value)
	{
		// trick for using internal mechanism for automated update
		// but we have no updated field, so nothing to do ;)
		return $this;
	}
}

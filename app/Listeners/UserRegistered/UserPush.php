<?php

namespace App\Listeners\UserRegistered;

use App\Events\UserRegistered;
use Connect\Connect;
use Elasticsearch\ClientBuilder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mixpanel;

class UserPush implements ShouldQueue {
	use InteractsWithQueue;

	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRegistered  $event
	 * @return void
	 */
	public function handle(UserRegistered $event) {
		$client = ClientBuilder::create()->build();
		$payload = ['user' => $event->user];
		Connect::initialize('', '');
		$mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
		$mp->people->set($event->user->id, $payload);
		$mp->track($event);

		Connect::push('users', $payload);

		$params = [
			'index' => 'main',
			'type' => 'user',
			'id' => $event->user->id,
			'body' => $event->user,
		];
		$client->index($params);
//        $event->user->pushToIndex();
	}
}

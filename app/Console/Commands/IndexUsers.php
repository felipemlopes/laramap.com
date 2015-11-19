<?php

namespace App\Console\Commands;

use App\User;
use Connect\Connect;
use Illuminate\Console\Command;
use Mixpanel;

class IndexUsers extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'users:pushtoindex';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Pushes all users to Algolia & getconnect.io';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$users = User::all();

		Connect::initialize('', '');
		$mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));

		foreach ($users as $user) {
			$payload = ['user' => $user];
			Connect::push('users', $payload);
			$user->pushToIndex();
		}
	}
}

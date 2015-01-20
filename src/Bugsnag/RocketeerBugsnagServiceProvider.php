<?php

namespace Rocketeer\Plugins\Bugsnag;

use Illuminate\Support\ServiceProvider;
use Rocketeer\Facades\Rocketeer;

class RocketeerBugsnagServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// ...
	}

	public function boot()
	{
		Rocketeer::plugin('Rocketeer\Plugins\Bugsnag\RocketeerBugsnag');
	}
}
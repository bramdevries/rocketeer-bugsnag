<?php

namespace Rocketeer\Plugins\Bugsnag;

use Rocketeer\Abstracts\AbstractPlugin;
use Rocketeer\Services\TasksHandler;
use Rocketeer\Tasks\Closure;
use Illuminate\Container\Container;

class RocketeerBugsnag extends AbstractPlugin
{
	/**
	 * @param Container $app
	 */
	public function __construct(Container $app)
	{
		parent::__construct($app);
		$this->configurationFolder = __DIR__ . '/../config';
	}

	/**
	 * Register Tasks with Rocketeer
	 *
	 * @param \Rocketeer\Services\TasksHandler $queue
	 *
	 * @return void
	 */
	public function onQueue(TasksHandler $queue)
	{
		$queue->after('deploy', function (Closure $task) {
			$task->explainer->line('Clearing bugsnag errors');

			$ch = curl_init('http://notify.bugsnag.com/deploy');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json'));

			$params = array(
				'apiKey'       => $this->config->get('rockteer-bugsnag::key'),
				'releaseStage' => $task->connections->getStage()
			);

			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
			curl_exec($ch);
		});
	}
}
<?php namespace Yhbyun\Snowman\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputArgument;
use Yhbyun\Snowman\Filesystem\FileAlreadyExists;
use Yhbyun\Snowman\Filesystem\Filesystem;
use Yhbyun\Snowman\Filesystem\FolderError;

class ResourceGeneratorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'snowman:resource';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a new resource';

	/**
	 * Generate a resource
	 *
	 * @return mixed
	 */
	public function fire() {
		$appName = $this->argument('appName');
		$modelName = $this->argument('modelName');

		$appPath = Config::get("snowman::config.target_parant_path")
			. '/' . ucwords($appName);

		$this->callRepo($appName, $modelName, $appPath);
		$this->callRepoInterface($appName, $modelName, $appPath);
		$this->callModel($appName, $modelName, $appPath);
		$this->callPresenter($appName, $modelName, $appPath);

		// All done!
		$this->info(sprintf(
			"All done!"
		));

	}

	/**
	 * Call repo generator
	 *
	 * @param $appName
	 * @param $appPath
	 */
	protected function callRepo($appName, $modelName, $appPath) {
		$this->call('snowman:repo', ['appName' => $appName,
			'modelName' => $modelName,
			'--path' => $appPath . '/Repos/Eloquent']);
	}

	/**
	 * Call repointerface generator
	 *
	 * @param $appName
	 * @param $appPath
	 */
	protected function callRepoInterface($appName, $modelName, $appPath) {
		$this->call('snowman:repointerface', ['appName' => $appName,
			'modelName' => $modelName,
			'--path' => $appPath . '/Repos']);
	}

	/**
	 * Call model generator
	 *
	 * @param $appName
	 * @param $appPath
	 */
	protected function callModel($appName, $modelName, $appPath) {
		$this->call('snowman:model', ['appName' => $appName,
			'modelName' => $modelName,
			'--path' => $appPath]);
	}

	/**
	 * Call presenter generator
	 *
	 * @param $appName
	 * @param $appPath
	 */
	protected function callPresenter($appName, $presenterName, $appPath) {
		$this->call('snowman:presenter', ['appName' => $appName,
			'presenterName' => $presenterName,
			'--path' => $appPath . '/Presenters']);
	}

	/**
	 * Create folder
	 *
	 * @param $path
	 */
	protected function createFolder($path) {
		$file = new Filesystem;

		$file->mkdir($path);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return [
			['appName', InputArgument::REQUIRED, 'The namespace of the App'],
			['modelName', InputArgument::REQUIRED, 'The name of the desired model']
		];
	}

}

<?php namespace Yhbyun\Snowman\Commands;

use Symfony\Component\Console\Input\InputArgument;

class PresenterGeneratorCommand extends GeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'snowman:presenter';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a presenter';

	/**
	 * The path where the file will be created
	 *
	 * @return mixed
	 */
	protected function getFileGenerationPath() {
		$path = $this->getPathByOptionOrConfig('path', 'presenter_target_path');

		return $path. '/' . ucwords($this->argument('presenterName')) . 'Presenter.php';
	}

	/**
	 * Fetch the template data
	 *
	 * @return array
	 */
	protected function getTemplateData() {
		return [
			'APPNAME' => ucwords($this->argument('appName')),
			'NAME' => ucwords($this->argument('presenterName')),
			'INSTANCE' => '$' . snake_case($this->argument('presenterName')),
		];
	}

	/**
	 * Get path to the template for the generator
	 *
	 * @return mixed
	 */
	protected function getTemplatePath() {
		return $this->getPathByOptionOrConfig('templatePath', 'presenter_template_path');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return [
			['appName', InputArgument::REQUIRED, 'The namespace of the App'],
			['presenterName', InputArgument::REQUIRED, 'The name of the desired presenter']
		];
	}

}

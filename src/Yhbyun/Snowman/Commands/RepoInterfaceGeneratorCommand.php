<?php namespace Yhbyun\Snowman\Commands;

use Symfony\Component\Console\Input\InputArgument;

class RepoInterfaceGeneratorCommand extends GeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'snowman:repointerface';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a repo interface';

	/**
	 * The path where the file will be created
	 *
	 * @return mixed
	 */
	protected function getFileGenerationPath() {
		$path = $this->getPathByOptionOrConfig('path', 'repo_interface_target_path');

		return $path. '/' . ucwords($this->argument('modelName')) . 'RepoInterface.php';
	}

	/**
	 * Fetch the template data
	 *
	 * @return array
	 */
	protected function getTemplateData() {
		return [
			'APPNAME' => ucwords($this->argument('appName')),
			'NAME' => ucwords($this->argument('modelName'))
		];
	}

	/**
	 * Get path to the template for the generator
	 *
	 * @return mixed
	 */
	protected function getTemplatePath() {
		return $this->getPathByOptionOrConfig('templatePath', 'repo_interface_template_path');
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

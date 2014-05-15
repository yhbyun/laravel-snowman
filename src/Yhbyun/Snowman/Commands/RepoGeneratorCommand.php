<?php namespace Yhbyun\Snowman\Commands;

use Symfony\Component\Console\Input\InputArgument;

class RepoGeneratorCommand extends GeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'snowman:repo';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a repo';

	/**
	 * The path where the file will be created
	 *
	 * @return mixed
	 */
	protected function getFileGenerationPath() {
		$path = $this->getPathByOptionOrConfig('path', 'repo_target_path');

		return $path. '/' . ucwords($this->argument('repoName')) . '.php';
	}

	/**
	 * Fetch the template data
	 *
	 * @return array
	 */
	protected function getTemplateData() {
		return [
			'APPNAME' => ucwords($this->argument('appName')),
			'NAME' => ucwords($this->argument('repoName')),
			'INSTANCE' => '$' . snake_case($this->argument('repoName')),
		];
	}

	/**
	 * Get path to the template for the generator
	 *
	 * @return mixed
	 */
	protected function getTemplatePath() {
		return $this->getPathByOptionOrConfig('templatePath', 'repo_template_path');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return [
			['appName', InputArgument::REQUIRED, 'The namespace of the App'],
			['repoName', InputArgument::REQUIRED, 'The name of the desired repo']
		];
	}

}

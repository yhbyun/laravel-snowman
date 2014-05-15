<?php namespace Yhbyun\Snowman;

use Illuminate\Support\ServiceProvider;
use Yhbyun\Snowman\Commands\BaseRepoGeneratorCommand;
use Yhbyun\Snowman\Commands\BaseRepoInterfaceGeneratorCommand;
use Yhbyun\Snowman\Commands\ModelGeneratorCommand;
use Yhbyun\Snowman\Commands\PresenterGeneratorCommand;
use Yhbyun\Snowman\Commands\RepoGeneratorCommand;
use Yhbyun\Snowman\Commands\RepoInterfaceGeneratorCommand;
use Yhbyun\Snowman\Commands\RepoServiceProviderGeneratorCommand;
use Yhbyun\Snowman\Commands\ResourceGeneratorCommand;
use Yhbyun\Snowman\Commands\ScaffoldGeneratorCommand;

class SnowmanServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->package('yhbyun/snowman');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		foreach([
					'Model',
					'Repo',
					'RepoInterface',
					'BaseRepo',
					'BaseRepoInterface',
					'Presenter',
					'RepoServiceProvider',
					'Scaffold',
					'Resource',
					] as $command) {
			$this->{"register$command"}();
		}
	}

	/**
	 * Register the model generator
	 */
	protected function registerModel() {
		$this->app['generate.model'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new ModelGeneratorCommand($generator);
		});

		$this->commands('generate.model');
	}

	/**
	 * Register the repo generator
	 */
	protected function registerRepo() {
		$this->app['generate.repo'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new RepoGeneratorCommand($generator);
		});

		$this->commands('generate.repo');
	}

	/**
	 * Register the repointerface generator
	 */
	protected function registerRepoInterface() {
		$this->app['generate.repointerface'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new RepoInterfaceGeneratorCommand($generator);
		});

		$this->commands('generate.repointerface');
	}

	/**
	 * Register the baserepo generator
	 */
	protected function registerBaseRepo() {
		$this->app['generate.baserepo'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new BaseRepoGeneratorCommand($generator);
		});

		$this->commands('generate.baserepo');
	}

	/**
	 * Register the baserepointerface generator
	 */
	protected function registerBaseRepoInterface() {
		$this->app['generate.baserepointerface'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new BaseRepoInterfaceGeneratorCommand($generator);
		});

		$this->commands('generate.baserepointerface');
	}

	/**
	 * Register the presenter generator
	 */
	protected function registerPresenter() {
		$this->app['generate.presenter'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new PresenterGeneratorCommand($generator);
		});

		$this->commands('generate.presenter');
	}

	/**
	 * Register the reposerviceprovider generator
	 */
	protected function registerRepoServiceProvider() {
		$this->app['generate.reposerviceprovider'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new RepoServiceProviderGeneratorCommand($generator);
		});

		$this->commands('generate.reposerviceprovider');
	}

	/**
	 * Register the regtsterscaffold generator
	 */
	protected function registerScaffold() {
		$this->app['generate.scaffold'] = $this->app->share(function($app) {
			return new ScaffoldGeneratorCommand;
		});

		$this->commands('generate.scaffold');
	}

	/**
	 * Register the regtsterresource generator
	 */
	protected function registerResource() {
		$this->app['generate.resource'] = $this->app->share(function($app) {
			return new ResourceGeneratorCommand;
		});

		$this->commands('generate.resource');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}

}

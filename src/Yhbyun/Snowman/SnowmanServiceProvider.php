<?php namespace Yhbyun\Snowman;

use Illuminate\Support\ServiceProvider;
use Yhbyun\Snowman\Commands\BaseRepoGeneratorCommand;
use Yhbyun\Snowman\Commands\BaseRepoInterfaceGeneratorCommand;
use Yhbyun\Snowman\Commands\ModelGeneratorCommand;
use Yhbyun\Snowman\Commands\PresenterGeneratorCommand;
use Yhbyun\Snowman\Commands\PublishTemplatesCommand;
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
					'Publisher',
				] as $command) {
			$this->{"register$command"}();
		}
	}

	/**
	 * Register the model generator
	 */
	protected function registerModel() {
		$this->app['snowman.model'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new ModelGeneratorCommand($generator);
		});

		$this->commands('snowman.model');
	}

	/**
	 * Register the repo generator
	 */
	protected function registerRepo() {
		$this->app['snowman.repo'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new RepoGeneratorCommand($generator);
		});

		$this->commands('snowman.repo');
	}

	/**
	 * Register the repointerface generator
	 */
	protected function registerRepoInterface() {
		$this->app['snowman.repointerface'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new RepoInterfaceGeneratorCommand($generator);
		});

		$this->commands('snowman.repointerface');
	}

	/**
	 * Register the baserepo generator
	 */
	protected function registerBaseRepo() {
		$this->app['snowman.baserepo'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new BaseRepoGeneratorCommand($generator);
		});

		$this->commands('snowman.baserepo');
	}

	/**
	 * Register the baserepointerface generator
	 */
	protected function registerBaseRepoInterface() {
		$this->app['snowman.baserepointerface'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new BaseRepoInterfaceGeneratorCommand($generator);
		});

		$this->commands('snowman.baserepointerface');
	}

	/**
	 * Register the presenter generator
	 */
	protected function registerPresenter() {
		$this->app['snowman.presenter'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new PresenterGeneratorCommand($generator);
		});

		$this->commands('snowman.presenter');
	}

	/**
	 * Register the reposerviceprovider generator
	 */
	protected function registerRepoServiceProvider() {
		$this->app['snowman.reposerviceprovider'] = $this->app->share(function($app) {
			$generator = $this->app->make('Yhbyun\Snowman\Generator');

			return new RepoServiceProviderGeneratorCommand($generator);
		});

		$this->commands('snowman.reposerviceprovider');
	}

	/**
	 * Register the regtsterscaffold generator
	 */
	protected function registerScaffold() {
		$this->app['snowman.scaffold'] = $this->app->share(function($app) {
			return new ScaffoldGeneratorCommand;
		});

		$this->commands('snowman.scaffold');
	}

	/**
	 * Register the regtsterresource generator
	 */
	protected function registerResource() {
		$this->app['snowman.resource'] = $this->app->share(function($app) {
			return new ResourceGeneratorCommand;
		});

		$this->commands('snowman.resource');
	}

	/**
	 * register command for publish templates
	 */
	public function registerPublisher()
	{
		$this->app['snowman.publish-templates'] = $this->app->share(function($app)
		{
			return new PublishTemplatesCommand;
		});

		$this->commands('snowman.publish-templates');
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


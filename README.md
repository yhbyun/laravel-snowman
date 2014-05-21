# Fast Workflow in Laravel With Repository Pattern Generators

This Laravel 4 package provides a variety of generators to speed up your development process. These generators include:

- `snowman:baserepo`
- `snowman:baserepointerface`
- `snowman:model`
- `snowman:presenter`
- `snowman:repo`
- `snowman:repointerface`
- `snowman:reposerviceprovider`
- `snowman:resource`
- `snowman:scaffold`

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `yhbyun/snowman`.

	"require-dev": {
		"yhbyun/snowman": "dev-master"
	}

Next, update Composer from the Terminal:

    composer update --dev

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Yhbyun\Snowman\SnowmanServiceProvider'

That's it! You're all set to go. Run the `artisan` command from the Terminal to see the new `snowman` commands.

    php artisan

## Usage

- [Scaffolding](#scaffolding)
- [Resources](#resources)
- [Configuration](#configuration)

### Scaffolding

The `snowman:scaffold` command will do a number of things for you:

- Generate a application folder
- Generate a base repository
- Generate a base repository interface
- Generate a repository service provider

#### Example

```bash
php artisan snowman:scaffold acme
```

This single command will give you boilerplate for:

* Application Folder

  - app/Acme
  - app/Acme/Presenters
  - app/Acme/Providers
  - app/Acme/Repos
  - app/Acme/Repos/Eloquent

* app/Acme/Providers/RepoServiceProvider.php
* app/Acme/Repos/BaseRepoInterface.php
* app/Acme/Repos/Eloquent/BaseRepo.php


### Resources

The `snowman:resource` command will do a number of things for you:

- Generate a model
- Generate a model repository
- Generate a model repository interface
- Generate a model presenter
- Add binding in `RepoServiceProvider.php`

#### Example

```bash
php artisan snowman:resource acme post
```

This single command will do the following work:

- app/Acme/Presenters/PostPresenter.php
- app/Acme/Providers/RepoServiceProvider.php : add binding
- app/Acme/Repos/PostRepoInterface.php
- app/Acme/Repos/Eloquent/PostRepo.php
- app/Acme/Post.php


### Configuration

You may want to modify your templates - how the generated files are formatted. To allow for this, you
need to publish the templates that, behind the scenes, the generators will reference.

```bash
php artisan snowman:publish-templates
```

This will copy all templates to your `app/templates` directory. You can modify these however you wish to fit your desired formatting. If you'd prefer a different directory:

```bash
php artisan snowman:publish-templates --path=app/foo/bar/templates
```

When you run the `snowman:publish-templates` command, it will also publish
the configuration to `app/config/packages/yhbyun/snowman/config/config.php`. This file will look somewhat like:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Where the templates for the generators are stored...
    |--------------------------------------------------------------------------
    |
    */
    'model_template_path' => '/Users/yhbyun/my-project/app/templates/model.txt',
    'repo_template_path' => '/Users/yhbyun/my-project/app/templates/repo.txt',
    'repo_interface_template_path' => '/Users/yhbyun/my-project/app/templates/repo_interface.txt',
    'baserepo_template_path' => '/Users/yhbyun/my-project/app/templates/baserepo.txt',
    'baserepo_interface_template_path' => '/Users/yhbyun/my-project/app/templates/baserepo_interface.txt',
    'presenter_template_path' => '/Users/yhbyun/my-project/app/templates/presenter.txt',
    'reposerviceprovider_template_path' => '/Users/yhbyun/my-project/app/templates/reposerviceprovider.txt',


    /*
    |--------------------------------------------------------------------------
    | Where the generated files will be saved...
    |--------------------------------------------------------------------------
    |
    */

    'target_parant_path'	=> app_path(),
];
```

Also, while you're in this file, note that you can also update the default target directory for each generator.

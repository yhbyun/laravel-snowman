<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Where the templates for the snowman are stored...
    |--------------------------------------------------------------------------
    |
    */

    'model_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/model.txt',
    'repo_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/repo.txt',
    'repo_interface_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/repo_interface.txt',
    'baserepo_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/baserepo.txt',
    'baserepo_interface_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/baserepo_interface.txt',
    'presenter_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/presenter.txt',
    'reposerviceprovider_template_path' => 'vendor/yhbyun/snowman/src/Yhbyun/Snowman/templates/reposerviceprovider.txt',

    /*
    |--------------------------------------------------------------------------
    | Where the generated files will be saved...
    |--------------------------------------------------------------------------
    |
    */

    'target_parent_path' => app_path(),
    'model_target_path' => app_path() . '/$APPNAME$',
    'repo_target_path' => app_path() . '/$APPNAME$/Repos/Eloquent',
    'repo_interface_target_path' => app_path() . '/$APPNAME$/Repos',
    'baserepo_target_path' => app_path() . '/$APPNAME$/Repos/Eloquent',
    'baserepo_interface_target_path' => app_path() . '/$APPNAME$/Repos',
    'presenter_target_path' => app_path() . '/$APPNAME$/Presenters',
];

<?php
use \kartik\datecontrol\Module;

return [
    'name' => 'Membership App',
    //'language' => 'sr',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'EST',
    'components' => [
        'assetManager' => [
            'bundles' => [
                // we will use bootstrap css from our theme
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [], // do not use yii default one
                ],
                // // use bootstrap js from CDN
                // 'yii\bootstrap\BootstrapPluginAsset' => [
                //     'sourcePath' => null,   // do not use file from our server
                //     'js' => [
                //         'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js']
                // ],
                // // use jquery from CDN
                // 'yii\web\JqueryAsset' => [
                //     'sourcePath' => null,   // do not use file from our server
                //     'js' => [
                //         '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',
                //     ]
                // ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en'
                ],
            ],
        ],
    ], // components
    'modules' => [
        'datecontrol' =>  [
             'class' => 'kartik\datecontrol\Module',

             // format settings for displaying each date attribute (ICU format example)
             'displaySettings' => [
                 Module::FORMAT_DATE => 'M/dd/yyyy',
                 Module::FORMAT_TIME => 'h:mm:ss a',
                 Module::FORMAT_DATETIME => 'MM/dd/yyyy h:mm a', 
             ],

             // format settings for saving each date attribute (PHP format example)
             'saveSettings' => [
                 Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
                 Module::FORMAT_TIME => 'php:U',
                 Module::FORMAT_DATETIME => 'php:U',
                 //Module::FORMAT_TIME => 'php:H:i:s',
//                 Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
             ],

             // set your display timezone
//             'displayTimezone' => 'EST',

             // set your timezone for date saved to db
             'saveTimezone' => 'UTC',

             // automatically use kartik\widgets for each of the above formats
//             'autoWidget' => true,

             // use ajax conversion for processing dates from display format to save format.
             'ajaxConversion' => true,

             // default settings for each widget from kartik\widgets used when autoWidget is true
             'autoWidgetSettings' => [
                 Module::FORMAT_DATE => ['type'=>2, 'pluginOptions'=>['autoclose'=>true]], // example
                 Module::FORMAT_DATETIME => [], // setup if needed
                 Module::FORMAT_TIME => [], // setup if needed
             ],

             // custom widget settings that will be used to render the date input instead of kartik\widgets,
             // this will be used when autoWidget is set to false at module or widget level.
             'widgetSettings' => [
                 Module::FORMAT_DATE => [
                     'class' => 'yii\jui\DatePicker', // example
                     'options' => [
                         'dateFormat' => 'php:d-M-Y',
                         'options' => ['class'=>'form-control'],
                     ]
                 ]
             ]
             // other settings
        ]
    ],
    // set allias for our uploads folder so it can be shared by both frontend and backend applications
    // @appRoot alias is definded in common/config/bootstrap.php file
    'aliases' => [
        '@uploads' => '@appRoot/uploads'
    ],
];

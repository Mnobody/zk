<?php

declare(strict_types=1);

use App\ApplicationParameters;
use Psr\Log\LogLevel;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;

return [
    'aliases' => [
        '@root' => dirname(__DIR__),
        '@assets' => '@root/public/assets',
        '@assetsUrl' => '/assets',
        '@npm' => '@root/node_modules',
        '@public' => '@root/public',
        '@resources' => '@root/resources',
        '@runtime' => '@root/runtime',
        '@views' => '@root/resources/views'
    ],

    'yiisoft/cache-file' => [
        'file-cache' => [
            'path' => '@runtime/cache'
        ],
    ],

    'yiisoft/form' => [
        'fieldConfig' => [
            'inputCssClass()' => ['form-control input field'],
            'labelOptions()' => [['label' => '']],
            'errorOptions()' => [['class' => 'has-text-left has-text-danger is-italic']],
        ],
    ],

    'yiisoft/log-target-file' => [
        'file-target' => [
            'file' => '@runtime/logs/app.log',
            'levels' => [
                LogLevel::EMERGENCY,
                LogLevel::ERROR,
                LogLevel::WARNING,
                LogLevel::INFO,
                LogLevel::DEBUG,
            ],
        ],
        'file-rotator' => [
            'maxfilesize' => 10,
            'maxfiles' => 5,
            'filemode' => null,
            'rotatebycopy' => null
        ],
    ],

    'yiisoft/mailer' => [
        'mailerInterface' => [
            'composerPath' => '@resources/mail',
            'writeToFiles' => true,
            'writeToFilesPath' => '@runtime/mail',
        ],
        'swiftSmtpTransport' => [
            'host' => 'smtp.example.com',
            'port' => 25,
            'encryption' => null,
            'username' => 'admin@example.com',
            'password' => ''
        ],
    ],

    'yiisoft/view' => [
        'defaultParameters' => [
            'applicationParameters' => ApplicationParameters::class,
            'assetManager' => AssetManager::class,
            'field' => Field::class,
            'url' => UrlGeneratorInterface::class,
            'urlMatcher' => UrlMatcherInterface::class,
        ],
    ],

    'yiisoft/yii-web' => [
        'session' => [
            'options' => ['cookie_secure' => 0],
            'handler' => null
        ],
    ],

    'yiisoft/yii-debug' => [
        'enabled' => true
    ],

    'app' => [
        'charset' => 'UTF-8',
        'language' => 'en',
        'name' => 'My Project'
    ],

    'mailer' => [
        'adminEmail' => 'admin@example.com',
    ],

    // Cycle DBAL config
    'cycle.dbal' => [
        'default' => 'default',
        'aliases' => [],
        'databases' => [
            'default' => ['connection' => 'pgsql']
        ],
        'connections' => [
            'pgsql' => [
                'driver' => \Spiral\Database\Driver\Postgres\PostgresDriver::class,
                'connection' => 'pgsql:host=localhost;dbname=zk',
                'username' => '',
                'password' => '',
            ]
        ],
    ],
    // Cycle common config
    'cycle.common' => [
        // Entity directories list
        'entityPaths' => [
            '@src/Entity',
        ],
        // Turn on cache usage for getting DB schema
        'cacheEnabled' => true,
        // Key to use for cache
        'cacheKey' => 'Cycle-ORM-Schema',

        // Additional generators, launched when computing schema
        // Array of \Cycle\Schema\GeneratorInterface definitions
        'generators' => [
            // The following generator allows to apply schema changes to DB without migrations
            // \Cycle\Schema\Generator\SyncTables::class,
        ],

        // \Cycle\ORM\PromiseFactoryInterface definition
        'promiseFactory' => null, // use Promise objects
        // ProxyFactory requires cycle/proxy-factory package
        // 'promiseFactory' => \Cycle\ORM\Promise\ProxyFactory::class,

        // SQL query logger
        // \Psr\Log\LoggerInterface definition
        'queryLogger' => null,
    ],
    // Cycle migration config
    'cycle.migrations' => [
        'directory' => '@root/migrations',
        'namespace' => 'App\\Migration',
        'table' => 'migration',
        'safe' => false,
    ],
];

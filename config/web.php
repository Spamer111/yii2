<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-Ru',
    'defaultRoute' => 'category/index',
    'modules' => [ // подключение модуля админки
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin', // подключение вида админки
            'defaultRoute' => 'orders/index', // дефолтная главная страница админки
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/store', //путь где будут храниться оигинал изображения
            'imagesCachePath' => 'upload/cache', //путь где будут храниться ресайз изображения
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/upload/store/no-img.png', // будет выводиться картинка если изображения нет
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'iqXa1RShEZrhyWwY8mziBTCzwszFsYS0',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User', // клас для идентификации пользователя, можно использовать базовый или сощдать свой
            'enableAutoLogin' => true, //свойство отвечает за авторизацию пользователия по его куки, если стоит галачка запомнить пользователя
            //'loginUrl' => '' // куда будет перенаправлен пользователь если он не авторзован
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer', // что отправляет письмо, какой метод
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true, // если стоит true, то письмо не будет отправляться - для тестирования приложения, false - отправит письмо
            // + нужно настроить транспорт - настройки почтовика
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', // smpt - хост
                'username' => '', // имя на почте
                'password' => '', // пароль на почте
                'port' => '465', // порт почтовика искать в гугле
                'encryption' => 'ssl',

            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>' => 'category/view', //правила ЧПУ для пагинации
                'category/<id:\d+>' => 'category/view', //С лева указываеться как должна выглядеть ссылка, с права как она выглядит сейчас
                'product/<id:\d+>' => 'product/view', //С лева указываеться как должна выглядеть ссылка, с права как она выглядит сейчас
                'search' => 'category/search', //С лева указываеться как должна выглядеть ссылка, с права как она выглядит сейчас
                'coments' => 'coments/index', //С лева указываеться как должна выглядеть ссылка, с права как она выглядит сейчас
                'coment' => 'coment/view', //С лева указываеться как должна выглядеть ссылка, с права как она выглядит сейчас
            ],
        ],
/*
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],*/

    ],

    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'/web',
                //'basePath'=>'@webroot',
                'path' => 'upload/global', //путь куда будет загружаться файл
                'name' => 'Global' // папка куда грузим
            ],
           /* 'watermark' => [ // добавления к картинке водяного знака
                'source'         => __DIR__.'/logo.png', // Path to Water mark image
                'marginRight'    => 5,          // Margin right pixel
                'marginBottom'   => 5,          // Margin bottom pixel
                'quality'        => 95,         // JPEG image save quality
                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200         // Target image minimum pixel size
            ]*/
        ]
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors(){

        return [
            'access' => [
                'class' => AccessControl::className(), // класс который используем для контроля доступа
                'rules' => [ // правила
                    [
                        'allow' => true, // разрешены все действия для аторизованный пользователь
                        'roles' => ['@'] // роль показывает что это авторизованный пользователь
                    ]
                ]
            ]
        ];
    }


}

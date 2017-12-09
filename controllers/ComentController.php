<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 06.04.2017
 * Time: 11:58
 */

namespace app\controllers;
use Yii;
use app\models\Coment;


class ComentController extends AppController{

    public function actionView()
    {
      

        $data = Coment::find()->asArray()->all(); 
       // $data->delete(); 

        $test = $this->add();
        return $this->render('view', compact('data','test'));
    }


    public function add(){
        $model = new Coment(); 
         $model->name = 'User name'; 
         $model->email = 'mail@mail.ru';
         $model->coment = 'Это пиздец!';
        return $model;
    }

}
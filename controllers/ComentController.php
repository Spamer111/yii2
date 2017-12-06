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
       // $model = new Coment(); // создаем обьект класса комент - обьект класса
       // Записываем данные по полям в БД
       // $model->name = 'Имя пользователя3'; // Присваиваем данные полю name таблицы coment
       // $model->email = 'sdfsd@maol.ru';
       // $model->coment = 'sdfsd 85885';
       // $model->save(); //вызываем метод save который записывает данные в таблицу

        $data = Coment::find()->asArray()->all(); // получаем все данные из таблицы Coment бд - массив обьектов класса Coment
       // $data->delete(); // удаление выбранной строки

        $test = $this->add();
        return $this->render('view', compact('data','test'));
    }


    public function add(){
        $model = new Coment(); // создаем обьект класса комент - обьект класса
         $model->name = 'User name'; // Присваиваем данные полю name таблицы coment
         $model->email = 'mail@mail.ru';
         $model->coment = 'Это пиздец!';
        return $model;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 21.03.2017
 * Time: 14:24
 */

namespace app\models;
use yii\db\ActiveRecord; // Класс для рыботы с БД


class Product extends ActiveRecord{


    public function behaviors() // поведение для загрузки картинок
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){ //Метод указывает с какой таблицея связана данная модель
        return 'product'; //Данная модель связана с таблицей category
    }

    public function getCategory(){ // связь между таблицами category и product
        return $this->hasOne(Category::className(),['id' => 'category_id']); //В таблице Category(Category::className() поле id сзязано
        //с полем category_id таблицы  product
    }

}
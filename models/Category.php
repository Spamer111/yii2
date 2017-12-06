<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 21.03.2017
 * Time: 14:24
 */

namespace app\models;
use yii\db\ActiveRecord; // Класс для рыботы с БД


class Category extends ActiveRecord{


    public function behaviors() // поведение для загрузки картинок
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){ //Метод указывает с какой таблицея связана данная модель
        return 'category'; //Данная модель связана с таблицей category
    }

    public function getProducts(){ // связь между таблицами category и product
        return $this->hasMany(Product::className(),['category_id' => 'id']); //С таблице Product поле category_id сзязано
        //с полем id таблицы  category 
    }

}
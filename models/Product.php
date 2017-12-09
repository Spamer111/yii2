<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 21.03.2017
 * Time: 14:24
 */

namespace app\models;
use yii\db\ActiveRecord; 


class Product extends ActiveRecord{


    public function behaviors() 
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){ 
        return 'product'; 
    }

    public function getCategory(){ 
        return $this->hasOne(Category::className(),['id' => 'category_id']); 
        
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 06.04.2017
 * Time: 11:57
 */

namespace app\models;
use yii\db\ActiveRecord;

class Coment extends ActiveRecord{

public static function tableName(){
    return 'coment';
}

}
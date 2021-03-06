<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coments".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $coment
 */
class Coments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'coment'], 'required'],
            [['name', 'email', 'coment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'coment' => 'Coment',
        ];
    }
}

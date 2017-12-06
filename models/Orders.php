<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior; // Поведение
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $created_at
 * @property string $update_at
 * @property integer $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Orders extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }


    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(), // объявляем класс
                'attributes' => [ // указываем атрибуты
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'], //событие EVENT_BEFORE_INSERT - перед вставкой новой записи заполняет поля меткой времени UNIX
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'], //событие EVENT_BEFORE_INSERT - перед обновлением записи заполняет поле меткой времени UNIX
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'), // перевод метки времени из UNIX в понятный нам формат
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() // Правила для валидации
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'], // обязательные поля
            [['created_at', 'update_at'], 'safe'],
            [['qty'], 'integer'], // целое число
            [['sum'], 'number'], // просто число
            [['status'], 'boolean'], //
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255], // строка, максимум 255 символов
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() // Поля для формы как будут называться
    {
        return [
            'name' => 'Имя', //лево как поле называеться в БД - право как будет называться в форме
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }
}

<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property string $id
 * @property string $order_id
 * @property string $product_id
 * @property string $name
 * @property double $price
 * @property integer $qty_item
 * @property double $sum_item
 */
class OrderItems extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName() // название таблицы в бд
    {
        return 'order_items';
    }

    public function getOrders(){ // связь таблиз в бд
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'sum_item'], 'required'], // обязательные поля
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    }

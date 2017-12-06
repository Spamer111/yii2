<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;
    public $gallery;

    public function behaviors() // поведение для загрузки картинок
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


    public static function tableName()
    {
        return 'product';
    }


    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' =>'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'], // правила для одной картинки
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4], // правила для нескольких картинок
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Ключевые слвоа',
            'description' => 'Мата описсания',
            'image' => 'Фото',
            'gallery' => 'Галерея',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }

    public function upload() // загрузка картинок
    {
        if ($this->validate()) {
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }


    public function uploadGallery() // загрузка галереи
    {
        if ($this->validate()) { //если пройдена валидация
            foreach ($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension; //путь к файлу
                $file->saveAs($path); // сохраняем картинки
                $this->attachImage($path);
                @unlink($path); // удаляем оригинальный файл
            }
            return true;
        } else {
            return false;
        }
    }


}

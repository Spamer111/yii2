<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 27.03.2017
 * Time: 14:08
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\HttpException;

class ProductController extends AppController{

    public function actionView($id){
        //$id = Yii::$app->request->get('id'); // получаем id товара из массива GET
        $product = Product::findOne($id); //ленивая загрузка
        if(empty($product)){
            throw new HttpException(404, 'Такого товара нет');
        }
        //$product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one(); //жадная загрузка
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('TEST-SHOPPER | '.$product->name, $product->keywords, $product->description);// метод класса AppController, устанавливаем загалосок страницы,
        return $this->render('view', compact('product','hits'));
    }

}
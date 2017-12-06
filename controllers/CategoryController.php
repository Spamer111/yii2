<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 24.03.2017
 * Time: 9:03
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController{
    
    public function actionIndex(){
       // $hits = Product::find()->where(['hit' => '1'])->all();
        $query = Product::find()->where(['hit' => '1']); // создаем обьект запроса
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]); // создаем обьект класса Pagination и передаем ему параметры
        // totalCount - общее кол-во записей которое будет вытащено запросом $query->count - считаем количество записей
        // pageSize - количество записей которое выводиться на траницу (по умолчанию 20)
        // forcePageParam - отвечает за ЧПУ ссылки в пагинации (нужно еще писать правила в urlmanager)
        // pageSizeParam - отвечает за get параметр per-page в ссылке пагинации , если нужно его отключить ставит false
        $hits = $query->offset($pages->offset)->limit($pages->limit)->all();//offset($pages->offset) - с какой записи начинать выборку, limit($pages->limit) - сколько записей брать
        $this->setMeta('TEST-SHOPPER'); // метод класса AppController, устанавливаем загалосок страницы(TEST-SHOPPER), парметры ($keywords, $description) пусты
        return $this->render('index', compact('hits','pages')); //главная страница
    }

    public function actionView($id){
       // $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if(empty($category)){
            throw new HttpException(404, 'Такой категории нет');
        }
        //$products = Product::find()->where(['category_id' => $id])->all();
        //Пагинация - постраничная навигация
        $query = Product::find()->where(['category_id' => $id]); // создаем обьект запроса
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]); // создаем обьект класса Pagination и передаем ему параметры
        // totalCount - общее кол-во записей которое будет вытащено запросом $query->count - считаем количество записей
        // pageSize - количество записей которое выводиться на траницу (по умолчанию 20)
        // forcePageParam - отвечает за ЧПУ ссылки в пагинации (нужно еще писать правила в urlmanager)
        // pageSizeParam - отвечает за get параметр per-page в ссылке пагинации , если нужно его отключить ставит false
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();//offset($pages->offset) - с какой записи начинать выборку,
        // limit($pages->limit) - сколько записей брать

        $this->setMeta('TEST-SHOPPER | '.$category->name, $category->keywords, $category->description);// метод класса AppController, устанавливаем загалосок страницы,
        return $this->render('view', compact('products','pages','category')); //страница продуктов выбронной категории
    }
 
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('TEST-SHOPPER | '.$q);// метод класса AppController, устанавливаем загалосок страницы,
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like','name' ,$q]); // создаем обьект запроса
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

}
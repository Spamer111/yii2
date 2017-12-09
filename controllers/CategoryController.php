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
        $query = Product::find()->where(['hit' => '1']); 
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]); 
               $hits = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('TEST-SHOPPER'); 
        return $this->render('index', compact('hits','pages'));
    }

    public function actionView($id){
     

        $category = Category::findOne($id);
        if(empty($category)){
            throw new HttpException(404, 'Такой категории нет');
        }
        
        $query = Product::find()->where(['category_id' => $id]); 
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]); 
       
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
      

        $this->setMeta('TEST-SHOPPER | '.$category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products','pages','category')); 
    }
 
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('TEST-SHOPPER | '.$q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like','name' ,$q]); 
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

}
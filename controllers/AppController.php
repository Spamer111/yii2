<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 24.03.2017
 * Time: 9:05
 */

namespace app\controllers;
use yii\web\Controller;

class AppController extends Controller{

    protected function setMeta($title = null, $keywords = null, $description = null){ //метод устонавливает метатеги title, keywords, description
        $this->view->title = $title; // обращаемся к методу title класса view
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]); // обращаемся к методу registerMetaTag класса view - регестрируем метатег с именем(name) keywords и содержимым(content) $keywords
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]); // обращаемся к методу registerMetaTag класса view
    }

}
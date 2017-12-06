<?php
/**
 * Created by PhpStorm.
 * User: tq6y
 * Date: 16.02.2017
 * Time: 11:14
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function addToCart($product, $qty = 1){ //$product - информация о товаре, $qty - количество товара
        $mainImg = $product->getImage(); // получаем главную картинку
        if(isset($_SESSION['cart'][$product->id])){ //Проверяем если существует в массиве $_SESSION товар с таким ID
            $_SESSION['cart'][$product->id]['qty']+=$qty; // То в елемент массива qty(количество товара) добавляем то количество
                                                            // данного товара которое содержиться в переменной $qty
        } else { // Если такого товара в $_SESSION нету то создаем масиив с данными о товаре
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty, // количество товара
                'name' => $product->name, // название товара
                'price' =>$product->price, // цена
                //'img' =>$product->img //картинка
                'img' =>$mainImg->getUrl('50x') //картинка
            ];
        }
        // в массиве cart создаеться переменная qty
        // проверяетсья есть ли этот элемент существует isset($_SESSION['cart.qty']) то к этому элементу прибавляетсья переменная $qty -$_SESSION['cart.qty']+ $qty
        // если этого элемента нету то в него записываеться данные с переменной $qty
        if(isset($_SESSION['cart.qty'])){
            $_SESSION['cart.qty']=$_SESSION['cart.qty']+$qty;
        } else{
            $_SESSION['cart.qty'] = $qty;
        }
        //  $_SESSION['cart.qty']=isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+ $qty : $qty; - запись кода выше в одну строку
/*
        if(isset($_SESSION['cart.sum'])){
            $_SESSION['cart.sum']=$_SESSION['cart.sum']+$qty*$product->price;
        } else{
            $_SESSION['cart.sum'] = $qty*$product->price;
        }
*/
        $_SESSION['cart.sum']=isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+ $qty * $product->price : $qty*$product->price;// аналогичено что описано выше
    }

    public function recalc($id){ //удаление товара из корзины
        if(!isset($_SESSION['cart'][$id])) return false; //проверка есть ли в сесси такой элемент с id
        $qtyMinus = $_SESSION['cart'][$id]['qty']; //считаем количество товаров каторое будет удалено с данным ID
        $sumMinus = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price']; //считаем сумму товаров каторое будет удалено с данным ID
        $_SESSION['cart.qty'] -= $qtyMinus;//уменьшаем количество товаров в корзине на то которое будет удаляться
        $_SESSION['cart.sum'] -= $sumMinus; // уменьшаем сумму на сумму удаленных товаров
        unset($_SESSION['cart'][$id]); // удаляем тоовар с id из сессии
    }


}
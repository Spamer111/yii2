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

    public function addToCart($product, $qty = 1){ 
        $mainImg = $product->getImage(); 
        if(isset($_SESSION['cart'][$product->id])){ 
            $_SESSION['cart'][$product->id]['qty']+=$qty; 
                                                            
        } else { 
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty, 
                'name' => $product->name, 
                'price' =>$product->price, 
              
                'img' =>$mainImg->getUrl('50x') 
            ];
        }
       
        if(isset($_SESSION['cart.qty'])){
            $_SESSION['cart.qty']=$_SESSION['cart.qty']+$qty;
        } else{
            $_SESSION['cart.qty'] = $qty;
        }

        $_SESSION['cart.sum']=isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+ $qty * $product->price : $qty*$product->price;
    }

    public function recalc($id){ 
        if(!isset($_SESSION['cart'][$id])) return false; 
        $qtyMinus = $_SESSION['cart'][$id]['qty']; 
        $sumMinus = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price']; 
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus; 
        unset($_SESSION['cart'][$id]); 
    }


}
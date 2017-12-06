<?php
/**
 * Created by PhpStorm.
 * User: tq6y
 * Date: 16.02.2017
 * Time: 11:11
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Orders;
use app\models\OrderItems;
    use Yii;


        class CartController extends AppController{

           public function actionAdd(){
                $id = Yii::$app->request->get('id'); // получаем номер продукта из массива GET
                $qty =(int)Yii::$app->request->get('qty'); //получаем количество товара, число
                //$qty = !$qty ? 1 :$qty; // проверяем если !$qty возвращает лож (т.е не целое число) то переменной $qty присваеваем значение 1, иначе присваеваем то что было получено с сервера в переменной $qty
                if(!$qty){ // если не целое число
                    $qty =1;
                } else{
                    $qty=$qty;
                }
                $product = Product::findOne($id); // получаем из бд Product данные о продукте по его ID
                if (empty($product)) return false; // если данных нет то завершаем выполнения кода

                $session = Yii::$app->session; // помещаем обьект сессии в переменную 
                $session->open(); // открытие сесии

                $cart = new Cart(); // создаем обьект класса Cart - находиться в models
                $cart->addToCart($product, $qty); // вызываем метод addToCart обьекта и передаем ему параметры $product и $qty

                if(!Yii::$app->request->isAjax){ // если мы получаем данные не медодом Ajax
                    return $this->redirect(Yii::$app->request->referrer);// то редерект(переброс) на страницу откуда пришел пользователь
                }
                $this->layout = false; // убираем вывод шаблона
                return $this->render('cart-modal', compact('session'));
           }
           public function actionClear(){ // метод очистки карзины
                $session = Yii::$app->session; //
                $session->open(); //открыли сесссию
                $session->remove('cart'); //очистили массив по ключу cart
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                $this->layout = false;
                return $this->render('cart-modal', compact('session')); // возвращаем пустую карзину
           }

    public function actionDelItem(){ //удаление записи из карзины по клику на крестик
        $id = Yii::$app->request->get('id'); // получаем id товара
        $session = Yii::$app->session;
        $session->open(); //открыли сесссию
        $cart = new Cart(); // создаем обьект модели Cart
        $cart->recalc($id); // вызываем метод обьекта Cart
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
            

    public function actionShow(){
        $session = Yii::$app->session;
        $session->open(); //открыли сесссию
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $session = Yii::$app->session;
        $session->open(); //открыли сесссию
        $this->setMeta('Корзина');// метаданные
        $orders = new Orders(); // создаем обьект класса
        if($orders->load(Yii::$app->request->post())){ // если данные переданы
            $orders->qty = $session['cart.qty']; // получаем из сессии данные и записываем в бд
            $orders->sum = $session['cart.sum'];
            if($orders->save()){ // если заказ сохранен
                $this->saveOrderItems($session['cart'], $orders->id); // вызов метода сохранения в таблицу OrderItems, принимает карзину из сессии и ID заказа
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжиться с Вами'); // вывод сообщения на Flash
                Yii::$app->mailer->compose('order', ['session' => $session]) // compose - метод для отпавки почты. order - вид который будет отправляться пользователю, лежит mail/orders/
                // 'session' => $session - передаем карзину в вид
                    ->setFrom(['spam.by.86@gmail.com' => 'yii2.loc']) //адрес с какого отправляеться почта и название которое получаетль видет в строке отправитель
                    ->setTo($orders->email) //адрес куда отправляетсья почта(береться с формы и бд)
                    ->setSubject('заказ c сайта') //Тема письма
                    ->send(); //отправка почты
                $session->remove('cart'); // очистка коржины
                $session->remove('cart.qty'); // очистка коржины
                $session->remove('cart.sum'); // очистка коржины
                return $this->refresh(); // перезагрузка страницы
            } else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа'); // вывод сообщения на Flash
            }
        }
        return $this->render('view', compact('session', 'orders'));
    }

    protected function saveOrderItems($items, $order_id){ // сохранения в таблицу OrderItems
        foreach ($items as $id => $item){ // пройдемся в  цикле по массиву корзины и дастанем данные
            $order_items = new OrderItems(); // создание обьекта модели
            $order_items->order_id = $order_id; // запись данных в переменную
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty']*$item['price'];
            $order_items->save(); // сохраняем запись с данными в БД
        }
    }

}
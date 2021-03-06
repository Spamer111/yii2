<?php if(!empty($session['cart'])): // проверяем если массив не пуст то  выводим карзину?>
    <div class="table-responsive">
        <table class="table table-hover table-striped"> <!--class классы бутстрапа -->
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id=>$item):?>
                <tr>
                    <td><?= \yii\helpers\Html::img("{$item['img']}", ['alt' => $item['name']]);?></td>
                    <td><?= $item['name'];?></td>
                    <td><?= $item['qty'];?></td>
                    <td><?= $item['price'];?></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach?>
                <tr>
                    <td colspan="4">Итого:</td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                 <tr>
                    <td colspan="4">Сумма:</td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: // иначе карзина пуста?>
    <h3>Корзина пуста</h3>
<?php endif;?>

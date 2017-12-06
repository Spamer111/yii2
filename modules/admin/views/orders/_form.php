<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

<?php
   // echo DatePicker::widget(['name'  => 'from_date', 'value'  => $value,
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',]);
?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->widget(DatePicker::className(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd H:i:s',
    ])
    ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '0' => 'Активен', '1' => 'Завершен', ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

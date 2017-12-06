<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Coments */

$this->title = 'Create Coments';
$this->params['breadcrumbs'][] = ['label' => 'Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

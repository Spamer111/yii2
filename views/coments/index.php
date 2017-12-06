<?php

use yii\helpers\Html;
use yii\grid\GridView;
//Список коментария
$this->title = 'Coments';
$this->params['breadcrumbs'][] = $this->title;

//Добавления коментария
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



<div class="main">
<div class="content">
<div class="coments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'coment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
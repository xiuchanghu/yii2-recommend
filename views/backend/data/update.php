<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendData */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Recommend Data',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recommend Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recommend-data-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendList */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Recommend List',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recommend Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->lid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recommend-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

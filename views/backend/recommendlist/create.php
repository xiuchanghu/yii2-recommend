<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendList */

$this->title = Yii::t('app', 'Create Recommend List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recommend Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommend-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendData */

$this->title = Yii::t('app', 'Create Recommend Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recommend Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommend-data-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

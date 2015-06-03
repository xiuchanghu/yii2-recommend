<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recommend-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lid') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'summary') ?>

    <?= $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'pubtime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

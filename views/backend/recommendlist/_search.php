<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model xiuchanghu\recommend\models\RecommendlistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recommend-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'fontnum') ?>

    <?= $form->field($model, 'width') ?>

    <?= $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'filedir') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

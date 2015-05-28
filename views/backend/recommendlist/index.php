<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel xiuchanghu\recommend\models\RecommendlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recommend Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommend-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recommend List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lid',
            'name',
            'fontnum',
            'width',
            'height',
            // 'filedir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

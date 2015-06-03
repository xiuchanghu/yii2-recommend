<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel xiuchanghu\recommend\models\RecommendListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recommend Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommend-list-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recommend List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'fontnum',
            'width',
            'height',
            // 'filedir',

            ['class' => 'yii\grid\ActionColumn','header' => '操作',],
        ],
    ]); ?>

</div>
